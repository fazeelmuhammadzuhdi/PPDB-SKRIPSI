<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
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
        return view('setting.create', [
            'title' => "PENGATURAN APPLIKASI"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataSettings = $request->except('_token');

        if ($request->hasFile('pj_ttd')) {
            $request->validate(['pj_ttd' => 'required|mimes:png,jpg,jpeg|max:5000']);
            $dataSettings['pj_ttd'] = $request->file('pj_ttd')->store('public');
        }

        if ($request->hasFile('app_logo')) {
            $request->validate(['app_logo' => 'required|mimes:png,jpg,jpeg|max:5000']);
            $dataSettings['app_logo'] = $request->file('app_logo')->store('public');
        }

        settings()->set($dataSettings);
        flash("DATA BERHASIL DISIMPAN");
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
