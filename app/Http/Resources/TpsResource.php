<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TpsResource extends JsonResource
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
            'nomor' => $this->nomor,
            'nama' => $this->nama,
            'koordinator' => $this->koordinator,
            'distrik' => $this->distrik->nama,
            'desa' => $this->desa->nama,
            'total_pemilih' => $this->electors != null ? $this->electors->count() : 0,
            'total_pemilih_laki' => $this->electors->where('jenis_kelamin', 'Laki-laki')->count(),
            'total_pemilih_perempuan' => $this->electors->where('jenis_kelamin', 'Perempuan')->count(),
            'total_pemilih_tps' => $this->electors->where('tps_id', '!=', null)->count(),

            'total_dpt'  => $this->jumlah_dpt ? (int)$this->jumlah_dpt : 0,
            'total_dps' => $this->jumlah_dptb ? (int)$this->jumlah_dptb : 0,
            'total_dptb' => $this->jumlah_dps ? (int)$this->jumlah_dps : 0,
            'total_dp' => $this->jumlah_dpt + $this->jumlah_dptb + $this->jumlah_dps,
            'total_suara' => $this->suara ? (int)$this->suara : 0,
            'suara_didapat' => $this->suara_didapat ? (int)$this->suara_didapat : 0,
            'suara_sah' => $this->suara_sah ? (int)$this->suara_sah : 0,
            'suara_tidak_sah' => $this->suara_tidak_sah ? (int)$this->suara_tidak_sah : 0,
            'suara_golput' => $this->suara_golput ? (int)$this->suara_golput : 0,
            'presentasi_pemilih' => $this->jumlah_dpt > 0 ? round($this->electors->count() / $this->jumlah_dpt * 100, 2) : 0,
            'presentasi_suara' => $this->suara > 0 ? round($this->suara_didapat / $this->suara * 100, 2) : 0,

            'latitude' => $this->latitude ? (double)$this->latitude : 0,
            'longitude' => $this->longitude ? (double)$this->longitude : 0,

            ];
    }
}
