{!! Form::open(['route' => 'filterLaporanPertahun', 'method' => 'GET', 'target' => 'blank']) !!}
<div class="row">
    <div class="col-md-9 col-sm-12">
        <label for="ta">Tahun Ajaran</label>
        <select name="tahunajaran" class="form-control" required>
            <option value="">Pilih Tahun Ajaran</option>
            <option value="2023">2023 / 2024</option>
            <option value="2024">2024 / 2025</option>
            <option value="2025">2025 / 2026</option>
            <option value="2026">2026 / 2027</option>
        </select>
    </div>


    <div class="col-md-2 col-sm-12 mt-4">
        <button class="btn btn-primary" type="submit">Tampil</button>
    </div>
</div>
{!! Form::close() !!}
