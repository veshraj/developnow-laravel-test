<?php

namespace Modules\Auth\Repositories\Services;

use App\Exceptions\CustomException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Modules\Auth\Repositories\Contracts\UserRepositoryInterface;

class AuthService
{
    /**
     * @var  UserRepositoryInterface
     */
    protected UserRepositoryInterface $repository;
    
    protected Response $response;
    
    /**
     * @param  UserRepositoryInterface  $repository
     */
    public function __construct(UserRepositoryInterface $repository, Response $response)
    {
        $this->repository = $repository;
        $this->response   = $response;
    }
    
    
    /**
     * @param  Request  $request
     *
     * @return array
     * @throws CustomException
     */
    public function login(Request $request)
    : array {
        $user = $this->repository->getByVerifiedEmail($request->input('email'));
        
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw new CustomException("Your email/password is incorrect", 400);
        }
        
        if (is_null($user->email_verified_at)) {
            throw new CustomException("Email not verified yet.", 400);
        }
        
        $token = $user->createToken(config('app.name'));
        $this->response->header('token', $token->plainTextToken);
        
        return ['user' => $user, 'token' => $token->plainTextToken];
    }
    
    /**
     * @param  Request  $request
     *
     * @return void
     */
    public function logout(Request $request)
    : array {
        $request->user()->currentAccessToken()->delete();
        
        return [];
    }
    
    /**
     * @param  Request  $request
     *
     * @return array|string
     */
    public function forgotPassword(Request $request)
    : array|string {
        $user = $this->repository->getByVerifiedEmail($request->input('email'));
        if (!$user) {
            return [];
        }
        
        return Password::sendResetLink($request->validated());
    }
    
    /**
     * @param  Request  $request
     *
     * @return Authenticatable|null
     */
    public function me(Request $request)
    {
        return auth()->user();
    }
}
