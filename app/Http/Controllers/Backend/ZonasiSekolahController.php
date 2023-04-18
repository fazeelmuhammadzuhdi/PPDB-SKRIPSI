<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kampung;
use App\Models\Kecamatan;
use App\Models\Nagari;
use App\Models\Sekolah;
use App\Models\ZonasiSekolah;
use Illuminate\Http\Request;

class ZonasiSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonasiSekolah = ZonasiSekolah::with('nagari', 'kampung', 'kecamatan')->get();

        return view('zonasiSekolah.index', compact('zonasiSekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('zonasiSekolah.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sekolah = Sekolah::sekolah()->first();
        $data = $request->all();
        $data['sekolah_id'] = $sekolah->id;

        ZonasiSekolah::create($data);
        flash('Data berhasil disimpan');
        return redirect()->route('zonasisekolah.index');
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
        $zonasiSekolah = ZonasiSekolah::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('zonasiSekolah.edit', compact('kecamatan', 'zonasiSekolah'));
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
        $data = $request->all();

        $item = ZonasiSekolah::findOrFail($id);

        $item->update($data);
        flash('Data berhasil diupdate');
        return redirect()->route('zonasisekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ZonasiSekolah::findOrFail($id);

        $data->delete();

        flash('Data berhasil dihapus');
        return redirect()->back();
    }

    public function getnagari(Request $request)
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

    public function getkampung(Request $request)
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
}
