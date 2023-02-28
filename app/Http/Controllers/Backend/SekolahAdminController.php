<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\User;
use finfo;
use Illuminate\Http\Request;

class SekolahAdminController extends Controller
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
        $request->validate([
            'admin_sekolah_id' => 'required',
            'sekolah_id' => 'required',
        ]);



        $user = User::find($request->admin_sekolah_id);
        // dd($request->admin_sekolah_id);

        $sekolah = Sekolah::find($request->sekolah_id);
        // $a = $sekolah->sekolah_id = $request->admin_sekolah_id;
        // dd($a);
        // dd($sekolah);
        // if ($request->admin_sekolah_id == $sekolah->sekolah_id) {
        //     flash()->addError('Data Gagal di Tambahkan');
        // }
        $sekolah->sekolah_id = $request->admin_sekolah_id;
        $sekolah->save();
        flash('Data Berhasil di Tambahkan');
        return back();
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
        // $sekolah = Sekolah::findOrFail($id);
        // $sekolah->sekolah_id = null;
        // $sekolah->save();
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
