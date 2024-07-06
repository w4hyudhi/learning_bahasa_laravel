<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TotalResource extends JsonResource
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
        'total_pemilih' => $this['elector']->count(),
        'total_laki' => $this['elector']->where('jenis_kelamin', 'Laki-laki')->count(),
        'total_perempuan' => $this['elector']->where('jenis_kelamin', 'Perempuan')->count(),
        'total_distrik' => $this['distrik']->count(),
        'total_desa' => $this['desa']->count(),
        'total_tps' => $this['tps']->count(),
        'tps' => TpsResource::collection($this['tps']),
        'desa' => DesaResource::collection($this['desa']),
        ];
    }
}
