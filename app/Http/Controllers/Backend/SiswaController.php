<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaStoreRequest;
use App\Http\Requests\SiswaUpdateRequest;
use App\Models\Kampung;
use App\Models\Kecamatan;
use App\Models\Nagari;
use App\Models\Pekerjaan;
use App\Models\Penghasilan;
use App\Models\Siswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index', ['siswa' => Siswa::with('kecamatan', 'nagari', 'kampung')->siswa()->get(),'title' => 'BIODATA CALON PESERTA DIDIK',
        'cek' =>  Siswa::siswa()->count()
        ]);
    }
    public function create()
    {
        $cek = Siswa::siswa()->count();
        if ($cek == 1) {
            flash()->addError('Tidak Dapat Menambahkan Biodata Karena Biodata Anda Telah Lengkap');
        }
        return view('siswa.create', [
            'title' => 'Biodata Siswa',
            'penghasilan' => Penghasilan::orderBy('nama', 'asc')->get(),
            'pekerjaan' => Pekerjaan::orderBy('nama', 'asc')->get(),
            'cek' => $cek,
            'noPendaftaran' => Siswa::noPendaftaran(),
            'kecamatan' => Kecamatan::all(),
        ]);
    }
    public function store(SiswaStoreRequest $request)
    {
        $requestData = $request->validated();
        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('public/file/fotosiswa');
        }
        if ($request->hasFile('kk')) {
            $requestData['kk'] = $request->file('kk')->store('public/file/kartukeluarga');
        }
        $user = Siswa::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route('siswa.index');
    }
    public function edit($id)
    {
        $siswa = Siswa::siswa()->findOrFail(decrypt($id));
        return view("siswa.edit", [
            'siswa' => $siswa,
            'penghasilan' => Penghasilan::orderBy('nama', 'asc')->get(),
            'pekerjaan' => Pekerjaan::orderBy('nama', 'asc')->get(),
            'noPendaftaran' => Siswa::noPendaftaran(),
            'kecamatan' => Kecamatan::all(),
        ]);
    }
    public function update(SiswaUpdateRequest $request, $id)
    {
        $requestData = $request->validated();
        $siswa = Siswa::findOrFail(decrypt($id));
        if ($request->hasFile('foto')) {
            if ($siswa->foto !== null && Storage::exists($siswa->foto)) {
                Storage::delete($siswa->foto);
            }
            $requestData['foto'] = $request->file('foto')->store('public/file/fotosiswa');
        }
        if ($request->hasFile('kk')) {
            if ($siswa->kk !== null && Storage::exists($siswa->kk)) {
                Storage::delete($siswa->kk);
            }
            $requestData['kk'] = $request->file('kk')->store('public/file/kartukeluarga');
        }
        $siswa->fill($requestData);
        $siswa->save();
        flash('Data Berhasil Di Update');
        return redirect()->route('siswa.index');
    }
    public function getnagari(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $kecamatan = Nagari::where('kecamatan_id', $id_kecamatan)->get();
        $option = "<option>--Pilih Nagari--</option>";
        foreach ($kecamatan as $kec) {
            $option .= "<option value='$kec->id'>$kec->nama_nagari</option>";
        }
        return $option;
    }
    public function getkampung(Request $request)
    {
        $id_nagari = $request->id_nagari;
        $kampung = Kampung::where('nagari_id', $id_nagari)->get();
        $option = "<option>--Pilih Kampung--</option>";
        foreach ($kampung as $kam) {
            $option .= "<option value='$kam->id'>$kam->nama_kampung</option>";
        }
        return $option;
    }
}
