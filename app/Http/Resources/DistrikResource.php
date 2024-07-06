<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrikResource extends JsonResource
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
            'nama' => $this->nama,
            'koordinator' => $this->koordinator,
            'no_hp' => $this->no_hp,
            'latitude' => $this->latitude ? (double)$this->latitude : 0,
            'longitude' => $this->longitude ? (double)$this->longitude : 0,
            'desa' => DesaResource::collection($this->desa),
        ];
    }
}
