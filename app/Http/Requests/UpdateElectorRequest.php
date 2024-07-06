<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateElectorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nik' => 'nullable|string|size:16|unique:electors,nik,' . $this->elector->id,
            'nama' => 'required|string',
            'jenis_kelamin' => 'nullable|string',
            'alamat' => 'nullable|string',
            'distrik_id' => 'nullable|exists:distriks,id',
            'desa_id' => 'nullable|exists:desas,id',
            'tps_id' => 'nullable|exists:tps,id',
            'no_hp' => 'nullable|string',
        ];
    }
}
