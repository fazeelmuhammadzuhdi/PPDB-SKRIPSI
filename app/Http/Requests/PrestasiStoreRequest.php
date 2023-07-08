<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestasiStoreRequest extends FormRequest
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
            'k6sm1' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'k6sm2' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'k5sm1' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'k5sm2' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'k4sm2' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            // 'k6sm2' => 'required',
            // 'k5sm1' => 'required',
            // 'k5sm2' => 'required',
            // 'k4sm2' => 'required',
            'bukti_nilai_rapor' => 'required|file|mimes:pdf|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'sekolah_id.required' => ':attribute Tidak Boleh Kosong',
            'k6sm1.required' => ':attribute Tidak Boleh Kosong',
            'k6sm2.required' => ':attribute Tidak Boleh Kosong',
            'k5sm1.required' => ':attribute Tidak Boleh Kosong',
            'k5sm2.required' => ':attribute Tidak Boleh Kosong',
            'k4sm2.required' => ':attribute Tidak Boleh Kosong',
            'k6sm1.regex' => 'Format nilai tidak valid. Contoh Yang Valid Seperti Ini 80.8 / 80.80',
            'k6sm2.regex' => 'Format nilai tidak valid. Contoh Yang Valid Seperti Ini 90 / 80.80',
            'k5sm1.regex' => 'Format nilai tidak valid. Contoh Yang Valid Seperti Ini 70.75 / 80.80',
            'k5sm2.regex' => 'Format nilai tidak valid. Contoh Yang Valid Seperti Ini 80.8 / 80.80',
            'k4sm2.regex' => 'Format nilai tidak valid. Contoh Yang Valid Seperti Ini 80.8 / 80.80',
            'bukti_nilai_rapor.required' => ':attribute Tidak Boleh Kosong',
            'bukti_nilai_rapor.max' => ':attribute Maksimal 2 MB',
        ];
    }

    public function attributes(): array
    {
        return [
            'sekolah_id' => 'Nama Sekolah',
            'k6sm1' => 'Nilai Rapor Kelas 6 Semester 1',
            'k6sm2' => 'Nilai Rapor Kelas 6 Semester 2',
            'k5sm1' => 'Nilai Rapor Kelas 5 Semester 1',
            'k5sm2' => 'Nilai Rapor Kelas 5 Semester 2',
            'k4sm2' => 'Nilai Rapor Kelas 4 Semester 2',
            'bukti_nilai_rapor' => 'Bukti Nilai Rapor',

        ];
    }
}
