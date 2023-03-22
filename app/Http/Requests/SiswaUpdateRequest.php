<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaUpdateRequest extends FormRequest
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
            'nama_lengkap' => 'required',
            'nisn' => 'required|',
            Rule::unique('siswas', 'nisn')->ignore($this->id, 'id'),
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'sekolah_asal' => 'required',
            'no_kk' => 'required',
            // 'no_nik' => 'required|unique:siswas,no_nik,' . $this->siswa,
            'no_nik' => 'required|',
            Rule::unique('siswas', 'no_nik')->ignore($this->id, 'id'),
            'alamat' => 'required',
            'foto' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_lengkap.required' => ':attribute Tidak Boleh Kosong',
            'nisn.required' => ':attribute Tidak Boleh Kosong',
            'nisn.unique' => ':attribute Sudah Terdaftar',
            'tempat_lahir.required' => ':attribute Tidak Boleh Kosong',
            'tanggal_lahir.required' => ':attribute Tidak Boleh Kosong',
            'jenis_kelamin.required' => ':attribute Tidak Boleh Kosong',
            'agama.required' => ':attribute Tidak Boleh Kosong',
            'sekolah_asal.required' => ':attribute Tidak Boleh Kosong',
            'no_kk.required' => ':attribute Tidak Boleh Kosong',
            'no_nik.required' => ':attribute Tidak Boleh Kosong',
            'no_nik.unique' => ':attribute Sudah Terdaftar',
            'alamat.required' => ':attribute Tidak Boleh Kosong',
            'nama_ayah.required' => ':attribute Tidak Boleh Kosong',
            'pekerjaan_ayah.required' => ':attribute Tidak Boleh Kosong',
            'penghasilan_ayah.required' => ':attribute Tidak Boleh Kosong',
            'nama_ibu.required' => ':attribute Tidak Boleh Kosong',
            'pekerjaan_ibu.required' => ':attribute Tidak Boleh Kosong',
            'penghasilan_ibu.required' => ':attribute Tidak Boleh Kosong',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_lengkap' => 'Nama Lengkap',
            'nisn' => 'NISN',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'sekolah_asal' => 'Sekolah Asal',
            'no_kk' => 'Nomor Kartu Keluarga',
            'no_nik' => 'Nomor Induk Kependudukan',
            'alamat' => 'Alamat',
            'nama_ayah' => 'Nama Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'penghasilan_ayah' => 'Penghasilan Ayah',
            'nama_ibu' => 'Nama Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'penghasilan_ibu' => 'Penghasilan Ibu',
        ];
    }
}
