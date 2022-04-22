<?php

namespace App\Http\Resources\Api\web;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
//use Illuminate\Http\Resources\Json\ResourceCollection;


class FavoriteProductResource extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'number' => $this->product_number,
            'name' => $this->product_name,
            'available_count' => $this->available_count,
            'image' => $this->images[0]->url,
        ];
    }


}
