<?php

namespace App\Http\Resources\Api\web;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductsWithPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product' => $this->product_name,
            'product_number' => $this->product_number,
            'price' => $this
        ];
    }
}
