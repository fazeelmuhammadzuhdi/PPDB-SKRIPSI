<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kampung;
use App\Models\Kecamatan;
use App\Models\Nagari;
use App\Models\Sekolah;
use App\Models\Zonasi;
use App\Models\ZonasiSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataZonasiSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kecamatan = DB::table('kecamatans')
            ->join('zonasi_sekolahs', 'kecamatans.id', '=', 'zonasi_sekolahs.kecamatan_id')
            ->select('kecamatans.nama_kecamatan', 'zonasi_sekolahs.sekolah_id')
            ->groupBy('kecamatans.nama_kecamatan', 'zonasi_sekolahs.sekolah_id')
            ->get();


        $nagari = DB::table('nagaris')
            ->join('zonasi_sekolahs', 'nagaris.id', '=', 'zonasi_sekolahs.nagari_id')
            ->select('nagaris.nama_nagari', 'zonasi_sekolahs.sekolah_id')
            ->groupBy('nagaris.nama_nagari', 'zonasi_sekolahs.sekolah_id')
            ->get();

        $kampung = DB::table('kampungs')
            ->join('zonasi_sekolahs', 'kampungs.id', '=', 'zonasi_sekolahs.kampung_id')
            ->select('kampungs.nama_kampung', 'zonasi_sekolahs.sekolah_id')
            ->groupBy('kampungs.nama_kampung', 'zonasi_sekolahs.sekolah_id')
            ->get();

        $sekolah = Sekolah::all();

        return view('dataZonasiSekolah.index', compact('kecamatan', 'sekolah', 'nagari', 'kampung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
