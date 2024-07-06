<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $totalDpt = $this->tps->sum('jumlah_dpt');
        $totalDps = $this->tps->sum('jumlah_dps');
        $totalDtb = $this->tps->sum('jumlah_dptb');
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'koordinator' => $this->koordinator,
            'no_hp' => $this->no_hp,
            'total_pemilih' => $this->electors->count(),
            'total_pemilih_laki' => $this->electors->where('jenis_kelamin', 'Laki-laki')->count(),
            'total_pemilih_perempuan' => $this->electors->where('jenis_kelamin', 'Perempuan')->count(),
            'total_pemilih_tps' => $this->electors->where('tps_id', '!=', null)->count(),
            'total_dpt' => $totalDpt,
            'total_dps' => $totalDps,
            'total_dptb' => $totalDtb,
            'total_dp' => $totalDpt + $totalDps + $totalDtb,
            'total_suara' => $this->tps->sum('suara'),
            'suara_didapat' => $this->tps->sum('suara_didapat'),
            'suara_sah' => $this->tps->sum('suara_sah'),
            'suara_tidak_sah' => $this->tps->sum('suara_tidak_sah'),
            'suara_golput' => $this->tps->sum('suara_golput'),
            'presentasi_pemilih' => $totalDpt > 0 ? round($this->electors->count() / $totalDpt * 100, 2) : 0,
            'presentasi_suara' => $this->tps->sum('suara') > 0 ? round($this->tps->sum('suara_didapat') / $this->tps->sum('suara') * 100, 2) : 0,
            'latitude' => $this->latitude ? (double)$this->latitude : 0,
            'longitude' => $this->longitude ? (double)$this->longitude : 0,
            'total_desa' => $this->desa->count(),
            'desa' => DesaResource::collection($this->desa),
            'total_tps' => $this->tps->count(),
            'tps' => TpsResource::collection($this->tps),


            ];
    }
}
