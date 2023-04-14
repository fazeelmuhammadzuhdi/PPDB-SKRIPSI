<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Afirmasi;
use App\Models\Penghargaan;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class DataPendaftaranPrestasi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get data prestasi
        // $sekolah = Sekolah::where('sekolah_id', auth()->user()->id)->first();
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $prestasi = Prestasi::with('siswa')->where('sekolah_id', $sekolah->id)->orderBy('jumlah', 'desc')->get();
        $afirmasi = Afirmasi::with('siswa')->where('sekolah_id', $sekolah->id)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::with('siswa')->where('sekolah_id', $sekolah->id)->get();
        // dd($data_prestasi);
        return view('sekolah.data_pendaftaran', compact('prestasi', 'sekolah', 'afirmasi', 'pindahTugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $sekolah = Sekolah::where('sekolah_id', auth()->user()->id)->first();
        // dd($sekolah);
        // $data_prestasi = Prestasi::where('sekolah_id', $sekolah->id)->findOrFail($id);
        $data_prestasi = Prestasi::findOrFail(decrypt($id));
        $penghargaan = Penghargaan::where('siswa_id', $data_prestasi->siswa_id)->get();
        // dd($data_prestasi);

        return view('sekolah.detail_prestasi', compact('data_prestasi', 'penghargaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // $cekStatus = Prestasi::where('id', $id)->first();

        $lulus = Prestasi::where('id', $id)->update([
            'status' => 1
        ]);
        // dd($lulus);

        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
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

    public function updateStatusDitolak($id)
    {
        $lulus = Prestasi::where('id', $id)->update([
            'status' => 2
        ]);
        // dd($lulus);

        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
    }


    // public function viewPdf($id)
    // {
    //     $data = Prestasi::findOrFail(($id));

    //     $title = "Cetak Bukti Nilai Rapor";

    //     $pdf = Pdf::loadView('prestasi.view_pdf', compact('data', 'title'));
    //     $namaFile = "Bukti Nilai Rapor" . $data->id;
    //     return $pdf->stream($namaFile);
    // }
}
