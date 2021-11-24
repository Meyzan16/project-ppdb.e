<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginsiswaRequest extends FormRequest
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
            'nisn' => 'required|max:25|numerik|unique:tb_siswa',
            'nik' => 'required|max:25|numerik|unique:tb_siswa',
            'nama' => 'required|string|max:50'
        ];
    }
}
