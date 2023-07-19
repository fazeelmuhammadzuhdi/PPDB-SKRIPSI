 <center style="background-color: #fff; padding: 10px;"><b style="color:red;"><i data-feather="alert-circle"></i>
         PENDAFTARAN GRATIS,
         HATI-HATI PENIPUAN</b><br> <i data-feather="radio"></i> Pengumuman PPDB
 </center>
 @php
     $tutupPendaftaran = strtotime($tanggalAkhirPendaftaran);
     $sekarang = time();
     
     // Jika tanggal sekarang melebihi tanggal penutupan pendaftaran
     if ($sekarang >= $tutupPendaftaran) {
         // Menutup pendaftaran
         $selisihWaktu = 0;
     } else {
         // Hitung selisih waktu
         $selisihWaktu = max(0, $tutupPendaftaran - $sekarang);
     }
     
     // Hitung jumlah hari, jam, menit, dan detik
     $jumlahHari = floor($selisihWaktu / (60 * 60 * 24));
     $jumlahJam = floor(($selisihWaktu % (60 * 60 * 24)) / (60 * 60));
     $jumlahMenit = floor(($selisihWaktu % (60 * 60)) / 60);
     $jumlahDetik = $selisihWaktu % 60;
 @endphp

 @if ($selisihWaktu > 0)
     <div class="countdown">
         Pendaftaran PPDB Akan Ditutup dalam: <br>
         <span id="countdown">
             {{ $jumlahHari }} Hari {{ $jumlahJam }} Jam {{ $jumlahMenit }} Menit
             {{ $jumlahDetik }} Detik
         </span>
     </div>
 @else
     <center style="background-color: #fff; padding: 10px;">
         <b style="color:red;">PENDAFTARAN TELAH DI TUTUP</b><br>
     </center>
 @endif
