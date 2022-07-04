<?php
namespace Modules\Product\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Modules\Product\Repositories\Services\ProductCategoryService;
use Modules\Product\Http\Requests\ProductCategoryRequest;


class ProductCategoryController extends Controller {

    public $service;

    public function __construct(ProductCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->responsePaginate($this->service->getList($request));
    }


    public function store(ProductCategoryRequest $request)
    {
        return $this->responseCreated($this->service->create($request));
    }


    public function show(Request $request, $id)
    {
        return $this->responseOk($this->service->getById($id));
    }

    public function update(ProductCategoryRequest $request, $id)
    {
        return $this->responseUpdated($this->service->update($request, $id));
    }

    public function destroy(Request $request, $id)
    {
        return $this->responseSoftDeleted($this->service->delete($id));
    }

}
