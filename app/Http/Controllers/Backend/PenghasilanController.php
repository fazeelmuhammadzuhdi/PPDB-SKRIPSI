<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenghasilanController extends Controller
{
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
                                <span class="bx bx-edit-alt"></span> Edit
                            </button>
                            <button id="btnDeleteKategori" class="btn btn-danger btn-sm mx-2" data-id="' . $row['id'] . '">
                                <span class="bx bxs-trash-alt"></span> Hapus
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
        $penghasilan = Penghasilan::findOrFail($request->idKategori);
        return response()->json([
            'status' => 200,
            'jenisBuku' => $penghasilan
        ]);
    }
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
