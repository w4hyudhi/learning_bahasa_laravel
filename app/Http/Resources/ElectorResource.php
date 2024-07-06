<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElectorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['id' => $this->id,
        'nik' => $this->nik,
        'nama' => $this->nama,
        'no_hp' => $this->no_hp,
        'jenis_kelamin' => $this->jenis_kelamin,
        'alamat' => $this->alamat,
        'distrik_id' => $this->distrik_id? (int)$this->distrik_id : null,
        'distrik_nama' => $this->distrik->nama,
        'desa_id' =>$this->desa_id ? (int)$this->desa_id : null,
        'desa_nama' => $this->desa->nama,
        'tps_id' => $this->tps_id ? (int)$this->tps_id : null,
        'tps_nama' => $this->tps->nama,
    ];
    }
}
