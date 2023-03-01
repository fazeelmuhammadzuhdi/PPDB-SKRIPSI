<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class DashboardSiswaController extends Controller
{
    public function index()
    {

        return view('siswa.dashboard_siswa');
    }
}
