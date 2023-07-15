<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AfirmasiStoreRequest;
use App\Models\Afirmasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class AfirmasiController extends Controller
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
        $sekolah = Sekolah::all()->pluck('nama', 'id');

        return view('afirmasi.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AfirmasiStoreRequest $request)
    {
        $siswa = Siswa::siswa()->first();
        $requestData = $request->validated();
        $requestData['siswa_id'] = $siswa->id;
        // dd($requestData);
        // if ($request->hasFile('kk')) {
        //     $requestData['kk'] = $request->file('kk')->store('file/kk', 'public');
        // }
        if ($request->hasFile('skl')) {
            $requestData['skl'] = $request->file('skl')->store('file/skl', 'public');
        }
        if ($request->hasFile('kip')) {
            $requestData['kip'] = $request->file('kip')->store('file/kip', 'public');
        }
        if ($request->hasFile('sktm')) {
            $requestData['sktm'] = $request->file('sktm')->store('file/sktm', 'public');
        }
        // dd($requestData);

        Afirmasi::create($requestData);

        // return response()->json([
        //     'success' => "Anda Berhasil Mendaftar Di Jalur Pindah Tugas Orang Tua"
        // ]);

        flash("Berhasil Melakukan Pendaftaran");
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
