<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Client\Http\Requests\ClientUpdateRequest;
use  Modules\Client\Repositories\Services\ClientService;
use Modules\Client\Http\Requests\ClientRequest;


class ClientController extends Controller
{
    
    public $service;
    
    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        return $this->responsePaginate($this->service->getList($request));
    }
    
    
    public function store(ClientRequest $request)
    {
        return $this->responseCreated($this->service->create($request));
    }
    
    
    public function show(Request $request, $id)
    {
        return $this->responseOk($this->service->getById($id));
    }
    
    public function update(ClientUpdateRequest $request, $id)
    {
        return $this->responseUpdated($this->service->update($request, $id));
    }
    
    public function destroy(Request $request, $id)
    {
        return $this->responseSoftDeleted($this->service->delete($id));
    }
    
}
