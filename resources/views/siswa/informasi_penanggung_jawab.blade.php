 Mengetahui, <br>
 @if (request('output') == 'pdf')
     {{-- <img src="{{ storage_path() . '/app/' . settings()->get('pj_ttd') }}" alt="" width="70"> --}}
     {{-- <img src="{{ public_path() . '/images/logo.png' }}" alt="" width="70"> --}}
     <img src="{{ asset('images/logo.png') }}" alt="" width="70">
 @else
     {{-- <img src="{{ Storage::url(settings()->get('pj_ttd')) }}" alt="" width="130"> --}}
     <img src="{{ asset('images/ttd.png') }}" alt="" width="70">
 @endif
 <div class="text-end">
     <div style="border-bottom: 1px solid black; width:200px; text-align: left">
         {{-- {{ settings()->get('pj_nama') }} --}}
         Fazeel Muhammad Zuhdi
     </div>
 </div>
 <div>
     {{-- {{ settings()->get('pj_jabatan') }} --}}
     Ketua Dinas Pendidikan
 </div>
