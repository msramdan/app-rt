<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWargaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'no_kk' => 'required|string|max:100',
            'nik' => 'required|string|max:100',
            'agama' => 'required|in:Islam,Kristen Protestan,Kristen Katolik,Hindu,Buddha,Konghucu',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'status_kawin' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'golongan_darah' => 'required|in:A,B,AB,O',
            'pekerjaan' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kartu_keluarga' => 'nullable|image|max:4045',
        ];
    }
}
