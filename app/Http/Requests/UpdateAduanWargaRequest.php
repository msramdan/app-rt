<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAduanWargaRequest extends FormRequest
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
            'nama_pengirim' => 'required|string|max:255',
			'tanggal' => 'required|date',
			'judul' => 'required|string|max:255',
			'keterangan' => 'required|string',
        ];
    }
}
