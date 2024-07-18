<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemImageResponse extends JsonResource
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
            'category_id' => (int)  $this->category_image_id,
            'item_id' => $this->id,
            'item_name' => $this->name,
            'item_image' => $this->image,
            'item_name_tts' => $this->description,
        ];
    }
}
