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
        $dataKecamatan = Kecamatan::all();
        return view('dataZonasiSekolah.index', compact('kecamatan', 'sekolah', 'nagari', 'kampung', 'dataKecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataNagariZonasiSekolah(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        //get Data kecamatan    
        $kecamatan = Nagari::where('kecamatan_id', $id_kecamatan)->get();

        $option = "<option>--Pilih Nagari--</option>";
        //lakukan perulangan karena 1 provinsi mempunyai banyak kabupaten
        foreach ($kecamatan as $kec) {
            $option .= "<option value='$kec->id'>$kec->nama_nagari</option>";
        }
        return $option;
    }

    public function getDataKampungZonasiSekolah(Request $request)
    {
        $id_nagari = $request->id_nagari;

        //get Data kecamatan    
        $kampung = Kampung::where('nagari_id', $id_nagari)->get();

        $option = "<option>--Pilih Kampung--</option>";
        //lakukan perulangan karena 1 provinsi mempunyai banyak kabupaten
        foreach ($kampung as $kam) {
            $option .= "<option value='$kam->id'>$kam->nama_kampung</option>";
        }
        return $option;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sekolah_id'     => 'required',
            'kecamatan_id'   => 'required',
            'nagari_id'   => 'required',
            'kampung_id'   => 'required',
            'no_urut'   => 'required',
        ]);

        $cekNoUrut = ZonasiSekolah::where('sekolah_id', $request->sekolah_id)->where('no_urut', $request->no_urut)->first();
        if ($cekNoUrut) {
            return response()->json(['error' => 'No Urut Zonasi Sudah Ada']);
        } else {
            $setNilai = 71;
            $noUrut = $request->no_urut;
            $nilaiAkhirPrioritas = $setNilai - $noUrut;
        }

        ZonasiSekolah::create([
            'sekolah_id' => $request->sekolah_id,
            'kecamatan_id' => $request->kecamatan_id,
            'nagari_id' => $request->nagari_id,
            'kampung_id' => $request->kampung_id,
            'no_urut' => $request->no_urut,
            'nilai' => $nilaiAkhirPrioritas,
            // tambahkan properti lainnya jika ada
        ]);

        return response()->json(['success' => 'Data Zonasi Berhasil Di Tambahkan']);
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
        $data = ZonasiSekolah::where('sekolah_id', $id);

        $data->delete();

        return redirect()->back();
    }
}
