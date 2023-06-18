<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $viewIndex = 'index';
    private $viewCreate = 'create';
    private $viewEdit = 'crete';
    private $viewShow = 'show';
    private $routePrefix = 'user';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dinas.user.' . $this->viewIndex, [
            // 'user' => User::where('akses', '<>', 'Siswa')->where('akses', '<>', 'Admin Sekolah')->latest()->get()
            'user' => User::where('akses', '<>', 'Siswa')->latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data User Dinas Pendidikan dan Admin Sekolah',
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
    public function store(UserStoreRequest $request)
    {
        $requestData =  $request->validated();
        $requestData['password'] = bcrypt($request->password);
        $user = User::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route('user.index');
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
            'user' => User::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Edit User',
            'routePrefix' => $this->routePrefix,
        ];

        // dd($data);

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
            'email' => 'required|unique:users,email,' . $id,
            'nohp' => 'required|unique:users,nohp,' . $id,
            'akses' => 'required|in:Admin Dinas,Admin Sekolah',
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
        return redirect()->route('user.index');
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

        if ($user->id == auth()->user()->id) {
            flash()->addError('Anda tidak bisa menghapus akun anda sendiri', 'danger');
            return back();
        }
        $user->delete();
        $updateSekolah = Sekolah::where('sekolah_id', $id)->update(['sekolah_id' => null]);
        flash('Data berhasil dihapus');
        return back();
    }

    public function profile()
    {
        return view('dinas.user.profile', [
            'title' => 'Profile',
            'admin' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    public function dataCPD()
    {
        $dataCPD = Siswa::with(['kecamatan', 'kampung', 'nagari'])->get();
        // dd($dataCPD);
        $tahun = now()->format('Y');
        $title = "Data Calon Peserta Didik Baru Tahun {$tahun}";
        return view('data_calon_peserta_didik', compact('dataCPD', 'title'));
    }
}
