<?php

namespace App\Http\Resources\web;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
//use Illuminate\Http\Resources\Json\ResourceCollection;


class FavoriteProductResource extends JsonResource
{

//    public $collects = Product::class;
//    public static $wrap = 'week';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        dd($this);
//        return parent::toArray($request);
        return [
            'product number' => $this->product_number,
            'product name' => $this->product_name,
            'product count' => $this->available_count,
        ];
    }


}
