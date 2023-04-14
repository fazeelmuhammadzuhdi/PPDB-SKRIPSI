<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserSiswaController extends Controller
{
    private $viewIndex = 'user_siswa_index';
    private $viewCreate = 'user_siswa_create';
    private $viewEdit = 'user_siswa_crete';
    private $viewShow = 'show';
    private $routePrefix = 'usersiswa';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dinas.user.' . $this->viewIndex, [
            // 'user' => User::where('akses', '<>', 'Siswa')->where('akses', '<>', 'Admin Sekolah')->latest()->get()
            'user' => User::where('akses', 'Siswa')->latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Semua User Akses Siswa ',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user' => new User(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Tambah User',
            'routePrefix' => $this->routePrefix,
        ];

        return view('dinas.user.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData =  $request->all();
        $requestData['password'] = bcrypt($request->password);
        $user = User::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route('usersiswa.index');
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
        $data = [
            'user' => User::user()->findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Edit Siswa',
            'routePrefix' => $this->routePrefix,
        ];

        return view('dinas.user.' . $this->viewCreate, $data);
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
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'nohp' => 'required|unique:users,nohp,' . $id,
            'password' => 'nullable',
        ]);
        $user = User::findOrFail($id);

        // if password is not empty, then update password
        if ($request->password) {
            $requestData['password'] = bcrypt($request->password);
        } else {
            unset($requestData['password']);
        }
        $user->update($requestData);
        flash('Data berhasil diUpdate');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        flash('Data berhasil dihapus');
        return back();
    }
}
