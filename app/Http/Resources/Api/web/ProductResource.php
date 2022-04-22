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
            'available_count'=>$this->available_count,
            'image' => $this->images[0]->url,
        ];

    }
}
