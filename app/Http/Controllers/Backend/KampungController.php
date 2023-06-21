<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kampung;
use App\Models\Kecamatan;
use App\Models\Nagari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KampungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kampung = Kampung::with('nagari', 'kecamatan')->get();

        return view('kampung.index', compact('kampung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $nagari = Nagari::all();
        $kecamatan = Kecamatan::all();
        return view('kampung.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = Validator::make($request->all(), [
        //     'kecamatan_id' => 'required',
        //     'nagari_id' => 'required',
        //     'nama_kampung' => 'required',
        // ]);
        // if ($data->fails()) {
        //     return redirect()->back()->withErrors($data)->withInput();
        // } else {
        //     Kampung::create([
        //         'kecamatan_id' => $request->kecamatan_id,
        //         'nagari_id' => $request->nagari_id,
        //         'nama_kampung' => $request->nama_kampung,
        //     ]);

        //     flash('Data berhasil disimpan');

        //     return redirect()->route('nama_rute')->with('success', 'Data berhasil disimpan!');
        // }


        $validator = Validator::make($request->all(), [
            'kecamatan_id' => 'required',
            'nagari_id' => 'required|not_in:--Pilih Nagari--',
            'nama_kampung' => 'required',
        ], [
            'kecamatan_id.required' => 'Kecamatan harus dipilih.',
            'nagari_id.required' => 'Nagari harus dipilih.',
            'nagari_id.not_in' => 'Nagari harus dipilih.',
            'nama_kampung.required' => 'Nama Kampung harus diisi.',
        ]);

        // Jika validasi gagal, akan kembali ke halaman sebelumnya dengan pesan kesalahan
        // dan data input yang sudah diisi sebelumnya
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data ke database jika validasi berhasil
        Kampung::create([
            'kecamatan_id' => $request->kecamatan_id,
            'nagari_id' => $request->nagari_id,
            'nama_kampung' => $request->nama_kampung,
        ]);

        flash('Data berhasil disimpan');

        return redirect()->route('kampung.index');
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
        $kampung = Kampung::findOrFail($id);
        // $nagari = Nagari::get();
        $kecamatan = Kecamatan::get();

        return view('kampung.edit', compact('kampung',  'kecamatan'));
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

        $item = Kampung::findOrFail($id);

        $item->update($data);

        flash('Data berhasil diupdate');
        return redirect()->route('kampung.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kampung::findOrFail($id);

        $item->delete();

        // flash('Data berhasil dihapus');
        return redirect()->back();
    }

    public function getkecamatan(Request $request)
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
}
