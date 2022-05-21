<?php

namespace App\Http\Resources\Api\admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        self::wrap('categories');
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'category' => $this->category,
        ];
    }
}
