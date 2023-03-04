<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaStoreRequest;
use App\Models\Pekerjaan;
use App\Models\Penghasilan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Biodata Siswa';
        $data['siswa'] = Siswa::where('user_id', auth()->user()->id)->get();
        // dd($data);
        return view('siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Biodata Siswa';
        $data['penghasilan'] = Penghasilan::all();
        $data['pekerjaan'] = Pekerjaan::all();
        $data['siswa'] = Siswa::all();
        // dd($data);
        return view('siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaStoreRequest $request)
    {
        $requestData = $request->validated();
        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('public');
        }
        $user = Siswa::create($requestData);
        // dd($user);
        flash('Data berhasil disimpan');
        return redirect()->route('siswa.index');
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
