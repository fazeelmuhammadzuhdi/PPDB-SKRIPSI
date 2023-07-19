<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Sekolah;
use App\Models\User;

class SekolahController extends Controller
{
    private $viewIndex = 'index';
    private $viewCreate = 'create';
    private $viewShow = 'show';
    private $routePrefix = 'sekolah';
    public function index()
    {
        return view('dinas.sekolah.' . $this->viewIndex, [
            'sekolah' => Sekolah::with('adminSekolah')->latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Semua Sekolah SMP Kabupaten Pesisir Selatan',
        ]);
    }
    public function create()
    {
        $userIdsTerdaftar = Sekolah::pluck('sekolah_id')->toArray();
        $data = [
            'sekolah' => new Sekolah(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Tambah Sekolah',
            'listUser' => User::whereNotIn('id', $userIdsTerdaftar)->where('akses', 'Admin Sekolah')->get(),
            'routePrefix' => $this->routePrefix,
        ];
        return view('dinas.sekolah.' . $this->viewCreate, $data);
    }
    public function store(StoreSekolahRequest $request)
    {
        $requestData =  $request->validated();
        $requestData['user_id'] = auth()->user()->id;
        // dd($requestData);
        $sekolah = Sekolah::create($requestData);
        flash('Data Sekolah ' .  $sekolah->nama . ' Berhasil Di Simpan');
        return redirect()->route('sekolah.index');
    }
    public function show($id)
    {
        return view('dinas.sekolah.' . $this->viewShow, [
            'sekolah' => Sekolah::findOrFail($id),
            'title' => 'Detail Data Sekolah',
        ]);
    }
    public function edit($id)
    {
        $data = [
            'sekolah' => Sekolah::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Edit Sekolah',
            'listUser' => User::where('akses', 'Admin Sekolah')->pluck('name', 'id'),
            'routePrefix' => $this->routePrefix,
        ];
        return view('dinas.sekolah.' . $this->viewCreate, $data);
    }
    public function update(UpdateSekolahRequest $request, $id)
    {
        $requestData = $request->validated();
        $requestData['user_id'] = auth()->user()->id;
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update($requestData);
        flash("Data Sekolah $sekolah->nama Berhasil Di Update");
        return redirect()->route('sekolah.index');
    }
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();
        return back();
    }
}
