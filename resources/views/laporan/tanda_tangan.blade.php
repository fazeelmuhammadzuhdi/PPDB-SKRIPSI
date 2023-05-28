 {{-- <table width="100%" style="margin-top: 30px;">
     <tr style="text-align: right !important;">
         <td>Painan, {{ now()->format('d F Y') }}</td>
     </tr>
     <tr style="text-align: right !important;">
         <td>Mengetahui,</td>
     </tr>
     <tr style="text-align: right !important;">
         <td> <img src="{{ Storage::url(settings()->get('pj_ttd')) }}" alt="" width="130"></td>
     </tr>
     <tr style="text-align: right !important; border-bottom: 1px solid black; width:200px; ">
         <td>{{ settings()->get('pj_nama') }}</td><br>
     </tr>

 </table> --}}
 {{-- <table style="margin-top: 30px; text-align: right">
     <tr style="text-align: right;">
         <td>Painan, {{ now()->format('d F Y') }}</td>
     </tr>
     <tr style="text-align: right;">
         <td>Mengetahui,</td>
     </tr>
     <tr style="text-align: right;">
         <td><img src="{{ Storage::url(settings()->get('pj_ttd')) }}" alt="" width="130"></td>
     </tr>
     <tr style="text-align: right; border-bottom: 1px solid black;">
         <td
             style="border-bottom: 1px solid black; padding-bottom: 10px; max-width: 200px; overflow: hidden; white-space: nowrap;">
             {{ settings()->get('pj_nama') }}
         </td>
     </tr>
     <tr style="text-align: right;">
         <td>{{ settings()->get('pj_jabatan') }}</td>
     </tr>
 </table> --}}

 {{-- <table width="100%" style="margin-top: 30px;">
     <tr style="text-align: right;">
         <td>Painan, {{ now()->format('d F Y') }}</td>
     </tr>
     <tr style="text-align: right;">
         <td>Mengetahui,</td>
     </tr>
     <tr style="text-align: right;">
         <td><img src="{{ Storage::url(settings()->get('pj_ttd')) }}" alt="" width="130"></td>
     </tr>
     <tr style="text-align: right; border-bottom: 1px solid black;">

         <td>
             {{ settings()->get('pj_nama') }}
         </td>
     </tr>
     <tr style="text-align: right;">
         <td>{{ settings()->get('pj_jabatan') }}</td>
     </tr>
 </table> --}}

 <table width="100%" style="margin-top: 30px;">
     <tr style="text-align: right;">
         <td>Painan, {{ now()->format('d F Y') }}</td>
     </tr>
     <tr style="text-align: right;">
         <td>Mengetahui,</td>
     </tr>
     <tr style="text-align: right;">
         <td><img src="{{ Storage::url(settings()->get('pj_ttd')) }}" alt="" width="130"></td>
     </tr>
     <tr style="text-align: right;">
         <td>
             {{ settings()->get('pj_nama') }}
         </td>
     </tr>
     <tr style="text-align: right;">
         <td style="margin-top: 10px;">{{ settings()->get('pj_jabatan') }}</td>
     </tr>
 </table>
