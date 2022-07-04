<?php
namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Modules\Product\Repositories\Services\ProductService;
use Modules\Product\Http\Requests\ProductRequest;


class ProductController extends Controller {

    public $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->responsePaginate($this->service->getList($request));
    }


    public function store(ProductRequest $request)
    {
        return $this->responseCreated($this->service->create($request));
    }


    public function show(Request $request, $id)
    {
        return $this->responseOk($this->service->getById($id));
    }

    public function update(ProductRequest $request, $id)
    {
        return $this->responseUpdated($this->service->update($request, $id));
    }

    public function destroy(Request $request, $id)
    {
        return $this->responseSoftDeleted($this->service->delete($id));
    }

}
