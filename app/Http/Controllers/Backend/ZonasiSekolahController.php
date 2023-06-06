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
        $sekolah = Sekolah::sekolah()->first();
        $zonasiSekolah = ZonasiSekolah::with('nagari', 'kampung', 'kecamatan')->where('sekolah_id', $sekolah->id)->orderBy('no_urut', 'asc')->orderBy('nilai', 'desc')->get();

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

        // cek apakah data sudah ada
        $existingData = ZonasiSekolah::where('sekolah_id', $sekolah->id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->where('nagari_id', $request->nagari_id)
            ->where('kampung_id', $request->kampung_id)
            ->first();

        if ($existingData) {
            flash()->addError('Data kecamatan, nagari, dan kampung sudah ada');
            return redirect(route('zonasisekolah.create')); // Hentikan eksekusi kode
        }

        // jika sudah ada no urutnya maka tampilkna pesan error
        $cekNoUrut = ZonasiSekolah::where('sekolah_id', $sekolah->id)->where('no_urut', $request->no_urut)->first();
        if ($cekNoUrut) {
            flash()->addError('No urut sudah ada');
            return redirect(route('zonasisekolah.create')); // Hentikan eksekusi kode
        } else {
            $setNilai = 71;
            $noUrut = $request->no_urut;
            $data['nilai'] = $setNilai - $noUrut;
        }
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
        // $data = $request->all();

        // $item = ZonasiSekolah::findOrFail($id);
        // $cekNoUrut = ZonasiSekolah::where('no_urut', $request->no_urut)->first();
        // if ($cekNoUrut) {
        //     flash()->addError('No urut sudah ada');
        //     return redirect(route('zonasisekolah.edit', $id)); // Hentikan eksekusi kode
        // } else {
        //     $setNilai = 71;
        //     $noUrut = $request->no_urut;
        //     $data['nilai'] = $setNilai - $noUrut;
        // }
        // $item->update($data);
        // flash('Data berhasil diupdate');
        // return redirect()->route('zonasisekolah.index');

        $sekolah = Sekolah::sekolah()->first();
        $data = $request->all();
        $item = ZonasiSekolah::findOrFail($id);
        $cekNoUrut = ZonasiSekolah::where('sekolah_id', $sekolah->id)->where('no_urut', $request->no_urut)->first();
        if ($cekNoUrut && $cekNoUrut->id != $id) {
            flash()->addError('No urut sudah ada');
            return redirect(route('zonasisekolah.edit', $id));
        } else {
            if ($request->filled('no_urut')) {
                $setNilai = 71;
                $noUrut = $request->no_urut;
                $data['nilai'] = $setNilai - $noUrut;
            }
        }

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

        // flash('Data berhasil dihapus');
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
