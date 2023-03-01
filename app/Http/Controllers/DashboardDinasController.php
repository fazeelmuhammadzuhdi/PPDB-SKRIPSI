<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class DashboardDinasController extends Controller
{
    public function index()
    {
        // $sekolah = Sekolah::select('nama', 'id')->where('sekolah_id', auth()->user()->id)->first();
        // dd($sekolah);
        // return view('dinas.dashboard_dinas', compact('sekolah'));
        return view('dinas.dashboard_dinas');
    }
}
