<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Pekrjaan";
        return view('dinas.pekerjaan.index', compact('title'));
    }

    public function fetchPekerjaan(Request $request)
    {
        $pekerjaan = Pekerjaan::all();

        if ($request->ajax()) {
            return datatables()->of($pekerjaan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <div class="btn-group">
                            <button id="btnEditKategori" class="btn btn-warning btn-sm" data-id="' . $row['id'] . '">
                                <span class="fas fa-edit"></span> Edit
                            </button>
                            <button id="btnDeleteKategori" class="btn btn-danger btn-sm mx-2" data-id="' . $row['id'] . '">
                                <span class="fas fa-trash-alt"></span> Hapus
                            </button>
                        </div>
                    ';
                })
                ->addColumn('checkbox', function ($row) {
                    return '
                         <input data-id="' . $row['id'] . '" type="checkbox" name="user_checkbox" id="user_checkbox">
                         <label for=""></label>
                    ';
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
        ], [
            'name.required' => 'Field Jenis Buku Wajib Diisi',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validation->errors()->toArray(),
            ]);
        } else {
            $pekerjaan = new Pekerjaan();
            $pekerjaan->nama = $request->name;
            $pekerjaan->save();

            return response()->json([
                'status' => 200,
                'success' => "Data " . $pekerjaan->nama . " Berhasil Di Simpan"
            ]);
        }
    }


    public function edit(Request $request)
    {
        $jenisBuku = Pekerjaan::findOrFail($request->idKategori);
        // $user = User::findOrFail($request->get('idUser'));

        return response()->json([
            'status' => 200,
            'jenisBuku' => $jenisBuku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',

        ], [
            'name.required' => 'Field Wajib Diisi',

        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validation->errors()->toArray(),
            ]);
        } else {
            $pekerjaan = Pekerjaan::findOrFail($request->idKategori);
            $pekerjaan->nama = $request->name;

            $pekerjaan->update();

            return response()->json([
                'status' => 200,
                'success' => "Data Pekerjaan Dengan Nama " . $pekerjaan->nama . " Berhasil Di Update"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pekerjaan = Pekerjaan::findOrFail($request->idKategori);
        $pekerjaan->delete();

        return response()->json([
            'status' => 200,
            'success' => "Data Dengan Nama Pekerjaan " . $pekerjaan->nama . " Berhasil Di Hapus"
        ]);
    }

    public function destroySelected(Request $request)
    {
        $idKategori = $request->idKategoris;
        $query = Pekerjaan::whereIn('id', $idKategori)->delete();

        if ($query) {
            return response()->json([
                'status' => 200,
                'success' => "Data Berhasil Di Hapus"
            ]);
        }
    }
}
