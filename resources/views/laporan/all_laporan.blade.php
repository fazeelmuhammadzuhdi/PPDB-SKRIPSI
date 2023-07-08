{!! Form::open(['route' => 'filterLaporan', 'method' => 'GET', 'target' => 'blank']) !!}
<div class="row">
    <div class="col-md-3 col-sm-12">
        <label for="ta">Tahun Ajaran</label>
        <select name="tahunajaran" class="form-control" required>
            <option value="">Pilih Tahun Ajaran</option>
            <option value="2023">2023 / 2024</option>
            <option value="2024">2024 / 2025</option>
            <option value="2025">2025 / 2026</option>
            <option value="2026">2026 / 2027</option>
        </select>
    </div>

    <div class="col-md-4 col-sm-12">
        <label for="">Jalur Pendaftaran</label>
        <select name="jalur" id="jalur" class="form-control" required>
            <option value="">Pilih Jalur Pendaftaran</option>
            <option value="zonasi">Zonasi</option>
            <option value="prestasi">Prestasi</option>
            <option value="afirmasi">Afirmasi</option>
            <option value="pindahtugas">Pindah Tugas Orang Tua</option>

        </select>
    </div>

    <div class="col-md-3 col-sm-12">
        <label for="">Status Pendaftaran</label>
        <select name="status" id="status" class="form-control" required>
            <option value="">Pilih Status Pendaftaran</option>
            <option value="1">Lulus</option>
            <option value="2">Belum Lulus</option>
        </select>
    </div>
    <div class="col-md-2 col-sm-12 mt-4">
        <button class="btn btn-primary" type="submit">Tampil</button>
    </div>
</div>
{!! Form::close() !!}
