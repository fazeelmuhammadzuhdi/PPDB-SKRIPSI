<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Nagari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NagariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nagari = Nagari::with('kecamatan')->get();
        return view('nagari.index', compact('nagari'));
    }

    public function add()
    {
        $data = Kecamatan::select([
            'id',
            'nama_kecamatan'
        ])->get();
        return response()->json($data);
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
        $this->validate($request, [
            'nama_nagari'     => 'required',
            'kecamatan_id'   => 'required',
        ]);

        Nagari::create([
            'nama_nagari'     => $request->nama_nagari,
            'kecamatan_id'   => $request->kecamatan_id,
        ]);

        //redirect to index
        return response()->json(['success' => 'Jurusan successfully added!']);
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

        $data['item'] = Nagari::with('kecamatan')->findOrFail($id);

        $data['option'] = Kecamatan::select([
            'id',
            'nama_kecamatan'
        ])->get();
        return response()->json($data);
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
        $this->validate($request, [
            'nama_nagari'   => 'required',
            'kecamatan_id'   => 'required',
        ]);

        $data = Nagari::findOrFail($id);
        $data->nama_nagari       = $request->nama_nagari;
        $data->kecamatan_id      = $request->kecamatan_id;
        $data->update();
        return response()->json(['success' => 'Jurusan successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nagari::findOrFail($id)->delete();
        return redirect()->back();
    }
}
