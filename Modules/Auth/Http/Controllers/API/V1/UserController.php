<?php

namespace Modules\Auth\Http\Controllers\API\V1;

use App\Constants\MessageCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Modules\Auth\Repositories\Services\UserService;
use Modules\Auth\Http\Requests\UserRequest;


class UserController extends Controller
{
    
    public $service;
    
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        return $this->responsePaginate($this->service->getList($request));
    }
    
    
    public function store(UserRequest $request)
    {
        return $this->responseCreated($this->service->create($request));
    }
    
    
    public function show(Request $request, $id)
    {
        return $this->responseOk($this->service->getById($id));
    }
    
    public function update(UserRequest $request, $id)
    {
        return $this->responseUpdated($this->service->update($request, $id));
    }
    
    public function destroy(Request $request, $id)
    {
        return $this->responseSoftDeleted($this->service->delete($id));
    }
    
}
