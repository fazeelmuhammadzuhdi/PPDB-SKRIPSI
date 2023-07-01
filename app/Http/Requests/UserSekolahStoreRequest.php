<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSekolahStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'nohp' => 'required|unique:users',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute Tidak Boleh Kosong',
            'email.required' => ':attribute Tidak Boleh Kosong',
            'nohp.required' => ':attribute Tidak Boleh Kosong',
            'password.required' => ':attribute Tidak Boleh Kosong',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email Address',
            'name' => 'Nama',
            'nohp' => 'No Hp',
            'password' => 'Password',
        ];
    }
}
