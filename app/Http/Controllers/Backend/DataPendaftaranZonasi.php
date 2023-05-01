<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Sekolah;
use App\Models\Zonasi;
use App\Models\ZonasiSekolah;
use Illuminate\Http\Request;

class DataPendaftaranZonasi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::sekolah()->first();
        $zonasi = Zonasi::with('siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        return view('zonasi.siswa_lulus', compact('zonasi', 'sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::sekolah()->first();
        $zonasi = Zonasi::with('siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        return view('zonasi.siswa_lulus', compact('zonasi', 'sekolah'));
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
        $title = 'Detail Pendaftaran Zonasi';
        $kecamatan = Kecamatan::all();
        $dataZonasi = Zonasi::with('siswa', 'sekolah')->findOrFail(decrypt($id));
        $dataZonasiSekolah = ZonasiSekolah::with('kecamatan', 'nagari', 'kampung')->where('sekolah_id', $dataZonasi->sekolah_id)->get();
        // dd($dataZonasiSekolah);
        return view('sekolah.detail_zonasi', compact('dataZonasi', 'title', 'dataZonasiSekolah', 'kecamatan'));
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
        $lulus = Zonasi::where('id', $id)->update([
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
        $lulus = Zonasi::where('id', $id)->update([
            'status' => 2
        ]);
        // dd($lulus);

        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
    }
}
