<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenghasilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Penghasilan";
        return view('dinas.penghasilan.index', compact('title'));
    }

    public function fetchPenghasilan(Request $request)
    {
        $penghasilan = Penghasilan::all();

        if ($request->ajax()) {
            return datatables()->of($penghasilan)
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
            'name.required' => 'Field Penghasilan Wajib Diisi',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validation->errors()->toArray(),
            ]);
        } else {
            $penghasilan = new Penghasilan();
            $penghasilan->nama = $request->name;
            $penghasilan->save();

            return response()->json([
                'status' => 200,
                'success' => "Data " . $penghasilan->nama . " Berhasil Di Simpan"
            ]);
        }
    }


    public function edit(Request $request)
    {
        $jenisBuku = Penghasilan::findOrFail($request->idKategori);
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
            'name.required' => 'Field Penghasilan Wajib Diisi',

        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validation->errors()->toArray(),
            ]);
        } else {
            $penghasilan = Penghasilan::findOrFail($request->idKategori);
            $penghasilan->nama = $request->name;

            $penghasilan->update();

            return response()->json([
                'status' => 200,
                'success' => "Data Penghasilan Dengan Nama " . $penghasilan->nama . " Berhasil Di Update"
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
        $penghasilan = Penghasilan::findOrFail($request->idKategori);
        $penghasilan->delete();

        return response()->json([
            'status' => 200,
            'success' => "Data Dengan Nama Penghasilan " . $penghasilan->nama . " Berhasil Di Hapus"
        ]);
    }

    public function destroySelected(Request $request)
    {
        $idKategori = $request->idKategoris;
        $query = Penghasilan::whereIn('id', $idKategori)->delete();

        if ($query) {
            return response()->json([
                'status' => 200,
                'success' => "Data Berhasil Di Hapus"
            ]);
        }
    }
}
