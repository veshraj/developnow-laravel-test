<?php

namespace Modules\Client\Repositories\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Repositories\Resources\ProductResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'product'          => new ProductResource($this->product),
            'client'           => new ClientResource($this->client),
            'quantity'         => $this->quantity,
            'price'            => $this->price,
            'line_item_amount' => $this->quantity * $this->price,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}
