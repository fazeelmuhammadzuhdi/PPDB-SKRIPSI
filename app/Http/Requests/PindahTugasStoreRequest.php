<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PindahTugasStoreRequest extends FormRequest
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
            'sekolah_id' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ];
    }


    public function messages(): array
    {
        return [
            'sekolah_id.required' => ':attribute Tidak Boleh Kosong',
            'file.required' => ':attribute Tidak Boleh Kosong',
            'file.max' => ':attribute Ukuran Max 2 Mb',
        ];
    }

    public function attributes(): array
    {
        return [
            'sekolah_id' => 'Nama Sekolah',
            'file' => 'Surat Keterangan Pindah Tugas',
        ];
    }
}
