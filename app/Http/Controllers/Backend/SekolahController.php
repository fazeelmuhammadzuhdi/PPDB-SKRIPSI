<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SekolahStoreRequest;
use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    private $viewIndex = 'index';
    private $viewCreate = 'create';
    private $viewEdit = 'crete';
    private $viewShow = 'show';
    private $routePrefix = 'sekolah';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dinas.sekolah.' . $this->viewIndex, [
            // 'sekolah' => Sekolah::latest()->get(),
            'sekolah' => Sekolah::with('adminSekolah')->latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Semua Sekolah',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSekolahRequest $request)
    {
        $requestData =  $request->validated();
        $requestData['user_id'] = auth()->user()->id;
        // dd($requestData);
        $sekolah = Sekolah::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route('sekolah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('dinas.sekolah.' . $this->viewShow, [
            'sekolah' => Sekolah::findOrFail($id),
            'title' => 'Detail Data Sekolah',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSekolahRequest $request, $id)
    {
        $requestData = $request->validated();
        $requestData['user_id'] = auth()->user()->id;
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update($requestData);
        flash('Data berhasil diUpdate');
        return redirect()->route('sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);

        flash("Data Berhasil Di Hapus");
        return back();
        $sekolah->delete();
        // flash('Data berhasil dihapus');
        return back();
    }
}
