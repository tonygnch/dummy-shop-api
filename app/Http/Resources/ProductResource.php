<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id, 
            'name' => $this->name,
            'type' => $this->type,
            'stock' => $this->stock,
            'color' => $this->color,
            'price' => $this->price,
            'material' => $this->material,
            'rating' => $this->rating,
            'sales' => $this->sales,
            'image' => $this->image,
            'department' => new DepartmentResource($this->whenLoaded('department')),
            'related' => ProductRelatedResource::collection($this->related())
        ];
    }
}
