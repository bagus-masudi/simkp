<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentVehicleRequest extends FormRequest
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
            'no_plat' => 'required',
            'merek' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'tgl_berakhir' => 'required',
            'tarif' => 'required',
            'tempat_sewa' => 'required',
            'status_vehicle' => 'required',
            'angkutan' => 'required'
        ];
    }
}
