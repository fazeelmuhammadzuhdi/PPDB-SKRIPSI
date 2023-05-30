<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrestasiStoreRequest;
use App\Models\Penghargaan;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('prestasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::all()->pluck('nama', 'id');
        // dd($sekolah);

        return view('prestasi.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestasiStoreRequest $request)
    {
        // $siswa = Siswa::with('prestasi')->where('user_id', auth()->user()->id)->first();
        $siswa = Siswa::siswa()->first();
        // dd($siswa);
        try {
            DB::transaction(function () use ($siswa, $request) {
                $collection = collect([$request->k4sm2, $request->k5sm1, $request->k5sm2, $request->k6sm1, $request->k6sm2]);

                $mapped = $collection->map(function ($item) {
                    return (int) $item;
                });

                $hasil = round($mapped->avg());

                $requestData = $request->validated();
                $requestData['siswa_id'] = $siswa->id;
                $requestData['jumlah'] = $hasil;

                if ($request->hasFile('bukti_nilai_rapor')) {
                    $requestData['bukti_nilai_rapor'] = $request->file('bukti_nilai_rapor')->store('file/bukti_nilai_rapor', 'public');
                }

                $prestasi = Prestasi::create($requestData);

                $validator = $request->validate([
                    'nama_penghargaan' => 'nullable|array',
                    'nama_penghargaan.*' => 'nullable',
                    'tahun' => 'nullable|array',
                    'tahun.*' => 'nullable',
                    'file' => 'nullable|array|max:2048',
                    'file.*' => 'nullable|mimes:jpg,jpeg,png'
                ]);

                $nama_penghargaan = $request->nama_penghargaan;
                $tahun = $request->tahun;
                $file = [];

                if (!empty($nama_penghargaan) && !empty($file) && !empty($tahun)) {
                    for ($i = 0; $i < count($nama_penghargaan); $i++) {
                        $penghargaan = Penghargaan::create([
                            'siswa_id' => $siswa->id,
                            'nama_penghargaan' => $nama_penghargaan[$i],
                            'tahun' => $tahun[$i],
                            'file' => isset($file[$i]) ? $file[$i] : null
                        ]);
                    }
                }
            });

            flash("Berhasil Melakukan Pendaftaran");
            return redirect()->route('jalur_pendaftaran');
        } catch (\Exception $e) {
            // Penanganan jika terjadi kesalahan dalam transaksi
            // Misalnya, memberikan pesan error atau melakukan rollback
            flash()->addError("Terjadi kesalahan saat melakukan pendaftaran");
            return redirect()->route('prestasi.create');
        }



        // $collection = collect([$request->k4sm2, $request->k5sm1, $request->k5sm2, $request->k6sm1, $request->k6sm2,]);

        // $mapped = $collection->map(function ($item) {
        //     return (int) $item;
        // });

        // // dd($mapped->all());

        // $hasil = round($mapped->avg());
        // // dd($hasil);
        // $requestData = $request->validated();
        // $requestData['siswa_id'] = $siswa->id;
        // $requestData['jumlah'] = $hasil;
        // if ($request->hasFile('bukti_nilai_rapor')) {
        //     $requestData['bukti_nilai_rapor'] = $request->file('bukti_nilai_rapor')->store('file/bukti_nilai_rapor', 'public');
        // }
        // // dd($requestData);

        // $prestasi = Prestasi::create($requestData);
        // // dd($prestasi);
        // $validator = $request->validate([
        //     'nama_penghargaan' => 'nullable|array',
        //     'nama_penghargaan.*' => 'nullable',
        //     'tahun' => 'nullable|array',
        //     'tahun.*' => 'nullable',
        //     'file' => 'nullable|array|max:2048',
        //     'file.*' => 'nullable|mimes:jpg,jpeg,png'
        // ]);

        // $nama_penghargaan = $request->nama_penghargaan;
        // $tahun = $request->tahun;
        // $file = [];

        // if ($request->hasFile('file')) {
        //     foreach ($request->file('file') as $item) {
        //         $name = $item->getClientOriginalName();
        //         $item->move(public_path() . '/images/prestasi/', $name);
        //         $file[] = $name;
        //     }
        // }

        // if (!empty($nama_penghargaan) && !empty($file)) {
        //     for ($i = 0; $i < count($nama_penghargaan); $i++) {
        //         $penghargaan = Penghargaan::create([
        //             'siswa_id' => $siswa->id,
        //             'nama_penghargaan' => $nama_penghargaan[$i],
        //             'tahun' => $tahun[$i],
        //             'file' => isset($file[$i]) ? $file[$i] : null
        //         ]);
        //     }
        // }
        // flash("Berhasil Melakukan Pendaftaran");
        // return redirect()->route('jalur_pendaftaran');

        //kodingan yang lama
        // $validator = $request->validate([
        //     'nama_penghargaan' => 'nullable',
        //     'tahun' => 'nullable',
        //     'file' => 'nullable', 'max:2048', 'mimes:jpg,jpeg,png'
        // ]);

        // $nama_penghargaan = $request->nama_penghargaan;
        // $tahun = $request->tahun;
        // $file = [];

        // if ($request->hasFile('file')) {
        //     foreach ($request->file('file') as $item) {
        //         $name = $item->getClientOriginalName();
        //         $item->move(public_path() . '/images/prestasi/', $name);
        //         $file[] = $name;
        //     }
        // }

        // if (!empty($nama_penghargaan)) {
        //     for (
        //         $i = 0;
        //         $i < count($nama_penghargaan);
        //         $i++
        //     ) {
        //         $penghargaan = Penghargaan::create([
        //             'siswa_id' => $siswa->id,
        //             'nama_penghargaan' => $nama_penghargaan[$i],
        //             'tahun' => $tahun[$i],
        //             'file' => $file[$i]
        //         ]);
        //     }
        // }

        // for ($i = 0; $i < count($nama_penghargaan); $i++) {
        //     $penghargaan = Penghargaan::create([
        //         'siswa_id' => $siswa->id,
        //         'nama_penghargaan' => $nama_penghargaan[$i],
        //         'tahun' => $tahun[$i],
        //         'file' => $file[$i]
        //     ]);
        // }
        // dd($penghargaan);
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
        //
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
        //
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
