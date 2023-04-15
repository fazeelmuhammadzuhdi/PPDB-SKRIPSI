<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PindahTugas;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class DataPendaftaranPindahTugas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::sekolah()->first();
        $pindahTugas = PindahTugas::with('siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        return view('pindah_tugas.siswa_lulus', compact('pindahTugas', 'sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::sekolah()->first();
        $pindahTugas = PindahTugas::with('siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        return view('pindah_tugas.siswa_lulus', compact('pindahTugas', 'sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Pendaftaran Pindah Tugas';
        $dataPindahTugas = PindahTugas::with('siswa', 'sekolah')->findOrFail(decrypt($id));
        return view('sekolah.detail_pindah_tugas', compact('dataPindahTugas', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lulus = PindahTugas::where('id', $id)->update([
            'status' => 1
        ]);
        // dd($lulus);

        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatusDitolak($id)
    {
        $lulus = PindahTugas::where('id', $id)->update([
            'status' => 2
        ]);
        // dd($lulus);

        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
    }
}
