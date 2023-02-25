<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDinasController extends Controller
{
    public function index()
    {
        return view('dinas.dashboard_dinas');
    }
}
