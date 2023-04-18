<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Zonasi;
use App\Models\ZonasiSekolah;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ZonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = ZonasiSekolah::get();
        // dd($sekolah);
        // $sekolah = ZonasiSekolah::get();
        $siswa = Siswa::siswa()->get();
        // dd($siswa);

        return view('zonasi.create', compact('sekolah', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = Siswa::siswa()->first();

        $zonasi = Zonasi::create([
            'siswa_id' => $siswa->id,
            'sekolah_id' => $request->sekolah_id,
        ]);
        // dd($zonasi);

        flash('Data berhasil disimpan');
        return redirect()->route('jalur_pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
