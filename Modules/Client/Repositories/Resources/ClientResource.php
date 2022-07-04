<?php

namespace Modules\Client\Repositories\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id'         => $this->id,
            'product_id' => $this->product_id,
            'client_it'  => $this->client_id,
            'quantity'   => $this->quantity,
            'price'      => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
