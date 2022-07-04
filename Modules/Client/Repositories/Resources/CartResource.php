<?php

namespace Modules\Client\Repositories\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'mobile'     => $this->mobile,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
