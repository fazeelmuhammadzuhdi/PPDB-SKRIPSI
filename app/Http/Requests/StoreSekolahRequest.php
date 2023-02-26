<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSekolahRequest extends FormRequest
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
            'sekolah_id' => 'nullable',
            'npsn' => 'required|unique:sekolahs,npsn',
            'nama' => 'required',
            'alamat' => 'required',
            'akreditasi' => 'required',
            'kecamatan' => 'required',
            'notelp' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'npsn.required' => ':attribute Tidak Boleh Kosong',
            'npsn.unique' => ':attribute Sudah Terdaftar',
            'nama.required' => ':attribute Tidak Boleh Kosong',
            'alamat.required' => ':attribute Tidak Boleh Kosong',
            'akreditasi.required' => ':attribute Tidak Boleh Kosong',
            'kecamatan.required' => ':attribute Tidak Boleh Kosong',
            'notelp.required' => ':attribute Tidak Boleh Kosong',
        ];
    }

    public function attributes(): array
    {
        return [
            'npsn' => 'NPSN',
            'nama' => 'Nama Sekolah',
            'alamat' => 'Alamat Sekolah',
            'akreditasi' => 'Akreditasi',
            'kecamatan' => 'Kecamatan',
            'notelp' => 'No Telepon',
        ];
    }
}
