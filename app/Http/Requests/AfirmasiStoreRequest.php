<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AfirmasiStoreRequest extends FormRequest
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
            // 'kk' => 'required|mimes:png,jpg,jpeg|max:2048',
            'kip' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'sktm' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'skl' => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
    }


    public function messages(): array
    {
        return [
            'sekolah_id.required' => ':attribute Tidak Boleh Kosong',
            // 'kk.required' => ':attribute Tidak Boleh Kosong',
            // 'kk.max' => ':attribute Ukuran Max 2 Mb',
            'kip.max' => ':attribute Ukuran Max 2 Mb',
            'sktm.max' => ':attribute Ukuran Max 2 Mb',
            'skl.required' => ':attribute Tidak Boleh Kosong',
            'skl.max' => ':attribute Ukuran Max 2 Mb',

        ];
    }

    public function attributes(): array
    {
        return [
            'sekolah_id' => 'Nama Sekolah',
            // 'kk' => 'Kartu Keluarga',
            'kip' => 'Kartu Indonesia Pintar / Kartu Keluarga Sejahtera',
            'sktm' => 'Surat Keterangan Tidak Mampu',
            'skl' => 'Surat Keterangan Lulus',
        ];
    }
}
