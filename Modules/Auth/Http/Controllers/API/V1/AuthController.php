<?php
/**
 * Created by Umesh Sujakhu
 * Date: 1/25/22
 * Time: 9:58 AM
 */

namespace Modules\Auth\Http\Controllers\API\V1;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\ChangePasswordRequest;
use Modules\Auth\Http\Requests\CreatePasswordRequest;
use Modules\Auth\Http\Requests\ForgotPasswordRequest;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\PasswordResetRequest;
use Modules\Auth\Http\Requests\ProfileRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Http\Requests\ResendVerificationLinkRequest;
use Modules\Auth\Http\Requests\VerifyEmailRequest;
use Modules\Auth\Repositories\Services\AuthService;

class AuthController extends Controller
{
    public AuthService $service;
    
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }
    
    /**
     * @param  LoginRequest  $request
     *
     * @return JsonResponse
     * @throws CustomException
     */
    public function login(LoginRequest $request)
    {
        return $this->responseOk($this->service->login($request), trans('auth::responses.auths.login_success'));
    }
    
    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function logout(Request $request)
    : JsonResponse {
        return $this->responseOk($this->service->logout($request), trans('auth::responses.auths.logout_success'));
    }
    
    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function get(Request $request)
    : JsonResponse {
        return $this->responseOk($this->service->me($request), trans('auth::responses.auths.fetch_detail_success'));
    }
}
