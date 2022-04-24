<?php

namespace App\Http\Resources\Api\web;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        self::wrap('product');
        return [
            'name'=>$this->product_name,
            'number'=>$this->product_number,
            'price'=>$this->latestPrice->price,
            'image' => $this->images[0]->url,
        ];

    }
}
