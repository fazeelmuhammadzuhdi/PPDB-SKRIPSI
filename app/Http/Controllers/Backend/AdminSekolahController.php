<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSekolahStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSekolahController extends Controller
{
    private $viewIndex = 'admin_sekolah_index';
    private $viewCreate = 'create';
    private $viewEdit = 'crete';
    private $viewShow = 'admin_sekolah_show';
    private $routePrefix = 'user-sekolah';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dinas.user.' . $this->viewIndex, [
            // 'user' => User::where('akses', '<>', 'Siswa')->where('akses', '<>', 'Admin Sekolah')->latest()->get()
            // 'user' => User::where('akses', 'Admin Sekolah')->where('id', auth()->user()->id)->latest()->get(),
            'userDinas' => User::where('akses', 'Admin Sekolah')->latest()->get(),
            'user' => User::where('akses', 'Admin Sekolah')->where('id', auth()->user()->id)->latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data User Sekolah',
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
            'title' => 'Form Edit User Sekolah',
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
    public function store(UserSekolahStoreRequest $request)
    {
        $requestData = $request->validated();
        $requestData['password'] = bcrypt($request->password);
        $requestData['akses'] = 'Admin Sekolah';
        $user = User::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route('user-sekolah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dinas.user.' . $this->viewShow, [
            'user' => User::AdminSekolah()->where('id', $id)->firstOrFail(),
            // 'sekolah' => Sekolah::whereNotIn('sekolah_id', [$id])->pluck('nama', 'id'),
            'sekolah' => Sekolah::where('sekolah_id', '=', null)->pluck('nama', 'id'),
            'routePrefix' => $this->routePrefix,
            'title' => 'Detail Data Admin Sekolah',
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
            // 'user' => User::findOrFail($id),
            'user' => User::where('id', auth()->user()->id)->findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Edit User Sekolah',
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
        return redirect()->route('user-sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
