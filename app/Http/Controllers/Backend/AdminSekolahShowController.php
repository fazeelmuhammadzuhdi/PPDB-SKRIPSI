<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSekolahShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
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
}
