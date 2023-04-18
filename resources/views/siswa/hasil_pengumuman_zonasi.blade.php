 @foreach ($cek_siswa->zonasis as $item)
     @if ($item->status == 1)
         <tr>
             <th colspan="27">
                 <img src="{{ asset('images/cop.png') }}" width="100%" alt="">
             </th>
         </tr>
         <tr>
             <th>
                 <h2 align="center"><b style="color:rgb(0, 0, 0);">Saudara :
                         {{ $item->siswa->nama_lengkap }} telah terdaftar sebagai calon
                         Siswa</b></h2>
                 <h3 style="color:rgb(0, 0, 0);" align="center">
                     </b>{{ $item->sekolah->nama }}</b></h3>
                 <p>Cetak Bukti Pendaftaran Ini sebagai syarat untuk daftar ulang
                     <br>
                 <ol>
                     <li> Silahkan Melengkapi Syarat-Syarat Berikut :</li>
                     <ul>
                         <li>(a). Fotocopy Nilai Rapor Terakhir atau Surat
                             Keterangan Lulus (SKL)
                         </li>
                         <li>(b). Pas Foto 3X4 3 Lembar</li>
                         <li>(c). Foto Copy Akta Kelahiran Berwarna dan Kartu
                             Keluarga (KK)
                         </li>
                     </ul>
                     <li>Menunjukkan Bukti / Kartu Pendaftaran yang Statusnya Telah DITERIMA </li>
                     <li>Menunjukkan Bukti Bahwasannya Anda Telah Dinyatakan Lulus</li>
                     <li> Semua Persyaratan diatas diserahkan paling lambat
                         Hari/Tanggal : Rabu / 5 Agustus 2020</li>
                 </ol>

                 <i style="color:orange">Alamat Sekolah :
                     {{ $item->sekolah->alamat }},
                     Telp. {{ $item->sekolah->notelp }},
                 </i>
                 <br>Informasi : Waktu pengantaran berkas persyaratan tunggu
                 informasi resmi pada Website atau Media Sosial
                 Resmi dari Dinas Pendidikan Dan Kebudayaan Pesisir Selatan
                 </p>

             </th>
         </tr>
         <tr>
             <br><br>

             <th>
                 <h2 align="center"> Hasil Penerimaan Peserta Didik Baru <br>
                     {{ $item->sekolah->nama }}</h2>
                 <h5 style="margin: 6%; text-align: justify"> Berdasarkan Seleksi yang
                     saudara lakukan
                     pada tanggal {{ $item->siswa->created_at }} WIB. Kami panitia
                     Penerimaan
                     Peserta Didik Baru Tahun Pelajaran {{ now()->format('Y') }}
                     Saudara yang bertanda tangan dibawah ini:<br><br>
                     <table width="70%" class="table table-bordered">
                         <tr>
                             <td>Nama Lengkap</td>
                             <td>{{ $item->siswa->nama_lengkap }}</td>
                         </tr>
                         <tr>
                             <td>Nomor Pendaftaran</td>
                             <td>{{ $item->siswa->no_pendaftaran }}</td>
                         </tr>

                         <tr>
                             <td>NISN</td>
                             <td>{{ $item->siswa->nisn }}</td>
                         </tr>
                         <tr>
                             <td>Sekolah Asal</td>
                             <td>{{ $item->siswa->sekolah_asal }}</td>
                         </tr>
                         <tr>
                             <td>Jalur Pendaftaran</td>
                             <td>ZONASI</td>
                         </tr>
                     </table>

                     <div class="mt-3">
                         <p>
                             Maka dengan ini bagi nama yang telah tercantum diatas, kami
                             menyatakan bahwa saudara <span style="color: rgb(0, 107, 0)">LULUS</span>
                         </p>
                     </div>

                 </h5>
             @elseif ($item->status == 2)
         <tr>
             <th colspan="27">
                 <img src="{{ asset('images/cop.png') }}" width="100%" alt="">
             </th>
         </tr>
         <tr>
             <th>
                 <h2 align="center"><b style="color:rgb(0, 0, 0);">Saudara :
                         {{ $item->siswa->nama_lengkap }} telah terdaftar sebagai calon
                         Siswa</b></h2>
                 <h3 style="color:rgb(0, 0, 0);" align="center">
                     </b>{{ $item->sekolah->nama }}</b></h3>
                 <p>Cetak Bukti Pendaftaran Ini sebagai syarat untuk daftar ulang
                     <br>
                 <ol>
                     <li> Silahkan Melengkapi Syarat-Syarat Berikut :</li>
                     <ul>
                         <li>(a). Fotocopy Nilai Rapor Terakhir atau Surat
                             Keterangan Lulus (SKL)
                         </li>
                         <li>(b). Pas Foto 3X4 3 Lembar</li>
                         <li>(c). Foto Copy Akta Kelahiran Berwarna dan Kartu
                             Keluarga (KK)
                         </li>
                     </ul>
                     <li>Menunjukkan Bukti / Kartu Pendaftaran yang Statusnya Telah DITERIMA </li>
                     <li>Menunjukkan Bukti Bahwasannya Anda Telah Dinyatakan Lulus</li>
                     <li> Semua Persyaratan diatas diserahkan paling lambat
                         Hari/Tanggal : Rabu / 5 Agustus 2020</li>
                 </ol>

                 <i style="color:orange">Alamat Sekolah :
                     {{ $item->sekolah->alamat }},
                     Telp. {{ $item->sekolah->notelp }}
                 </i>
                 <br>Informasi : Waktu pengantaran berkas persyaratan tunggu
                 informasi resmi pada Website atau Media Sosial
                 Resmi dari Dinas Pendidikan Dan Kebudayaan Pesisir Selatan
                 </p>

             </th>
         </tr>
         <tr>
             <br><br>
             <th>
                 <h2 align="center"> Hasil Penerimaan Peserta Didik Baru <br>
                     {{ $item->sekolah->nama }}</h2>
                 <h5 style="margin: 6%; text-align: justify"> Berdasarkan Seleksi yang
                     saudara lakukan
                     pada tanggal {{ $item->siswa->created_at }} WIB. Kami panitia
                     Penerimaan
                     Peserta Didik Baru Tahun Pelajaran {{ now()->format('Y') }}
                     Saudara yang bertanda tangan dibawah ini:<br><br>
                     <table width="70%" class="table table-bordered">
                         <tr>
                             <td>Nama Lengkap</td>
                             <td>{{ $item->siswa->nama_lengkap }}</td>
                         </tr>
                         <tr>
                             <td>Nomor Pendaftaran</td>
                             <td>{{ $item->siswa->no_pendaftaran }}</td>
                         </tr>

                         <tr>
                             <td>NISN</td>
                             <td>{{ $item->siswa->nisn }}</td>
                         </tr>
                         <tr>
                             <td>Sekolah Asal</td>
                             <td>{{ $item->siswa->sekolah_asal }}</td>
                         </tr>
                         <tr>
                             <td>Jalur Pendaftaran</td>
                             <td>Zonasi</td>
                         </tr>
                     </table>

                     <div class="mt-3">
                         <p>
                             Mohon maaf dengan ini bagi nama yang telah tercantum
                             diatas,kami
                             menyatakan bahwa saudara<span style="color: red"> BELUM
                                 LULUS</span> Tetap Semangat 😁
                         </p>
                     </div>
                 </h5>
             </th>
         </tr>
     @else
         <tr>
             <th colspan="27">
                 <img src="{{ asset('images/cop.png') }}" width="100%" alt="">
             </th>
         </tr>
         <tr>

             <th>
                 <h2 align="center"><b style="color:rgb(0, 0, 0);">Saudara :
                         {{ $item->siswa->nama_lengkap }} telah terdaftar sebagai calon
                         Siswa</b></h2>
                 <h3 style="color:rgb(0, 0, 0);" align="center">
                     </b>{{ $item->sekolah->nama }}</b></h3>
                 <p>Cetak Bukti Pendaftaran Ini sebagai syarat untuk daftar ulang
                     <br>
                 <ol>
                     <li> Silahkan Melengkapi Syarat-Syarat Berikut :</li>
                     <ul>
                         <li>(a). Fotocopy Nilai Rapor Terakhir atau Surat
                             Keterangan Lulus (SKL)
                         </li>
                         <li>(b). Pas Foto 3X4 3 Lembar</li>
                         <li>(c). Foto Copy Akta Kelahiran Berwarna dan Kartu
                             Keluarga (KK)
                         </li>
                     </ul>
                     <li>Menunjukkan Bukti / Kartu Pendaftaran yang Statusnya Telah DITERIMA </li>
                     <li>Menunjukkan Bukti Bahwasannya Anda Telah Dinyatakan Lulus</li>
                     <li> Semua Persyaratan diatas diserahkan paling lambat
                         Hari/Tanggal : Rabu / 5 Agustus 2020</li>
                 </ol>

                 <i style="color:orange">Alamat Sekolah :
                     {{ $item->sekolah->alamat }},
                     Telp. {{ $item->sekolah->notelp }},
                 </i>
                 <br>Informasi : Waktu pengantaran berkas persyaratan tunggu
                 informasi resmi pada Website atau Media Sosial
                 Resmi dari Dinas Pendidikan Dan Kebudayaan Pesisir Selatan
                 </p>

             </th>
         </tr>
         <tr>
             <br><br>
             <th>
                 <h2 align="center"> Hasil Penerimaan Peserta Didik Baru <br>
                     {{ $item->sekolah->nama }}</h2>
                 <h5 style="margin: 6%; text-align: justify"> Berdasarkan Seleksi yang
                     Saudara lakukan
                     pada tanggal {{ $item->siswa->created_at }} WIB. Kami panitia
                     Penerimaan
                     Peserta Didik Baru Tahun Pelajaran {{ now()->format('Y') }}
                     Saudara yang bertanda tangan dibawah ini:<br><br>
                     <table width="70%" class="table table-bordered">
                         <tr>
                             <td>Nama Lengkap</td>
                             <td>{{ $item->siswa->nama_lengkap }}</td>
                         </tr>
                         <tr>
                             <td>Nomor Pendaftaran</td>
                             <td>{{ $item->siswa->no_pendaftaran }}</td>
                         </tr>

                         <tr>
                             <td>NISN</td>
                             <td>{{ $item->siswa->nisn }}</td>
                         </tr>
                         <tr>
                             <td>Sekolah Asal</td>
                             <td>{{ $item->siswa->sekolah_asal }}</td>
                         </tr>
                         <tr>
                             <td>Jalur Pendaftaran</td>
                             <td>Zonasi</td>
                         </tr>
                     </table>

                     <div class="mt-3">
                         <p>
                             Maka dengan ini kami menyatakan bahwa data tersebut masih
                             dalam<span style="color: rgb(255, 200, 2)"> PROSES SELEKSI
                             </span>
                         </p>
                     </div>
                 </h5>
             </th>
         </tr>
     @endif
 @endforeach
