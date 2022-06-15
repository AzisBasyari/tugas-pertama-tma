<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
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
            'name' => 'required|max:255',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Minimal :min karakter!',
            'max' => 'Maksimal :max karakter!',
            'same' => 'Konfirmasi password harus sama dengan password awal anda!',
            'required' => 'Mohon isi data'
        ];
    }
}
