<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Afirmasi;
use App\Models\Penghargaan;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Zonasi;
use App\Models\ZonasiSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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
        $zonasi = Zonasi::with('siswa')->where('sekolah_id', $sekolah->id)->get();

        // $zonasiSekolah = ZonasiSekolah::where('sekolah_id', $sekolah->id)->orderBy('no_urut', 'asc')->orderBy('nilai', 'desc')->get();
        $zonasiSekolah = ZonasiSekolah::where('sekolah_id', $sekolah->id)->get();
        // $penghargaan = Penghargaan::where('siswa_id')->count('siswa_id');
        $penghargaan = Penghargaan::groupBy('siswa_id')
            ->select('siswa_id', DB::raw('COUNT(*) as total_penghargaan'))
            ->get();
        // dd($sekolah);
        // $sekolah = ZonasiSekolah::get();
        // $siswa = Siswa::get();
        // dd($data_prestasi);
        return view('sekolah.data_pendaftaran', compact('prestasi', 'sekolah', 'afirmasi', 'pindahTugas', 'zonasi', 'zonasiSekolah', 'penghargaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::sekolah()->first();
        $prestasi = Prestasi::with('siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->orderBy('jumlah', 'desc')->get();
        return view('prestasi.siswa_lulus', compact('sekolah', 'prestasi'));
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

    public function siswaLulusJalurPrestasi()
    {
        $sekolah = Sekolah::sekolah()->first();
        $prestasi = Prestasi::with('siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->orderBy('jumlah', 'desc')->get();
        return view('prestasi.siswa_lulus', compact('sekolah', 'prestasi'));
    }

    // public function viewPdf($id)
    // {
    //     $data = Prestasi::findOrFail(($id));

    //     $title = "Cetak Bukti Nilai Rapor";

    //     $pdf = Pdf::loadView('prestasi.view_pdf', compact('data', 'title'));
    //     $namaFile = "Bukti Nilai Rapor" . $data->id;
    //     return $pdf->stream($namaFile);
    // }

    // public function viewPdf($id)
    // {
    //     // Ambil data dari database berdasarkan $id
    //     $dataPrestasi = Prestasi::find($id);

    //     // Dapatkan path file PDF yang diunggah
    //     // $filePath = $dataPrestasi->bukti_nilai_rapor;
    //     // $fileContents = file_get_contents(public_path($filePath));


    //     // $filePath = 'file/bukti_nilai_rapor/' . $dataPrestasi->bukti_nilai_rapor;
    //     // $fileContents = file_get_contents(public_path($filePath));

    //     $filePath = 'file/bukti_nilai_rapor/' . $dataPrestasi->bukti_nilai_rapor;
    //     $fileContents = Storage::get($filePath);

    //     $response = Response::make($fileContents, 200, [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline; filename="bukti_nilai.pdf"',
    //     ]);

    //     $file = public_path($filePath);
    //     $permissions = 0644;

    //     // Mengatur izin file
    //     chmod($file, $permissions);


    //     return $response;

    //     // // Dapatkan data prestasi berdasarkan ID
    //     // $dataPrestasi = Prestasi::find($id);


    //     // $file = public_path($dataPrestasi->bukti_nilai_rapor);
    //     // return response()->file($file);

    //     // // Dapatkan path file PDF yang diunggah
    //     // $filePath = 'file/bukti_nilai_rapor/' . $dataPrestasi->bukti_nilai_rapor;
    //     // $fileContents = Storage::get($filePath);


    //     // // Buat response dengan header Content-Type: application/pdf
    //     // $response = response($fileContents)->header('Content-Type', 'application/pdf');

    //     // return $response;
    // }
}
