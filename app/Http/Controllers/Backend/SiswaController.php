<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaStoreRequest;
use App\Http\Requests\SiswaUpdateRequest;
use App\Models\Pekerjaan;
use App\Models\Penghasilan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $siswa = Siswa::where('user_id', auth()->user()->id)->get();
        // dd($siswa);
        // dd($data);
        return view('siswa.index', [
            'siswa' => Siswa::where('user_id', auth()->user()->id)->get(),
            'title' => 'BIODATA SISWA'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['title'] = 'Tambah Biodata Siswa';
        // $data['penghasilan'] = Penghasilan::all();
        // $data['pekerjaan'] = Pekerjaan::all();
        // $data['siswa'] = Siswa::all();
        // dd($data);
        // return view('siswa.create', $data);

        $cek = Siswa::where('user_id', Auth::user()->id)->count();
        if ($cek == 1) {
            flash()->addError('Tidak Dapat Menambahkan Biodata Karena Biodata Anda Telah Lengkap');
        }
        // dd($cek);

        return view('siswa.create', [
            'title' => 'Biodata Siswa',
            'penghasilan' => Penghasilan::all(),
            'pekerjaan' => Pekerjaan::all(),
            'cek' => $cek,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaStoreRequest $request)
    {
        $requestData = $request->validated();
        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('public');
        }
        $user = Siswa::create($requestData);
        // dd($user);
        flash('Data berhasil disimpan');
        return redirect()->route('siswa.index');
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
        // $data['title'] = 'Tambah Biodata Siswa';
        // $data['penghasilan'] = Penghasilan::all();
        // $data['pekerjaan'] = Pekerjaan::all();
        // $data['siswa'] = Siswa::findOrFail($id);

        // return view('siswa.edit', $data);

        // $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        // $siswa = Siswa::where('user_id', $id)->first();
        // $siswa = Siswa::findOrFail($id);

        $siswa = Siswa::where('user_id', auth()->user()->id)->findOrFail($id); // slug for user profile
        // dd($siswa);

        return view("siswa.edit", [
            'siswa' => $siswa,
            "penghasilan" => Penghasilan::all(),
            "pekerjaan" => Pekerjaan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaUpdateRequest $request, $id)
    {
        $requestData = $request->validated();

        $siswa = Siswa::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($siswa->foto !== null && Storage::exists($siswa->foto)) {
                Storage::delete($siswa->foto);
            }
            $requestData['foto'] = $request->file('foto')->store('public');
        }
        $siswa->fill($requestData);
        $siswa->save();

        // dd($siswa);

        flash('Data Berhasil Di Update');
        return redirect()->route('siswa.index');
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
