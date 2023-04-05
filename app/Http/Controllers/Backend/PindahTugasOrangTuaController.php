<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PindahTugasStoreRequest;
use App\Models\PindahTugas;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PindahTugasOrangTuaController extends Controller
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
        $sekolah = Sekolah::select('npsn', 'nama', 'id')->get();
        return view('pindah_tugas.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PindahTugasStoreRequest $request)
    {
        $siswa = Siswa::siswa()->first();
        $requestData = $request->validated();
        $requestData['siswa_id'] = $siswa->id;
        // dd($requestData);
        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')->store('file/pindahtugas', 'public');
        }

        // dd($requestData);

        PindahTugas::create($requestData);

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
