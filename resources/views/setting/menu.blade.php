<div class="row justify-content-center">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a class="nav-link {{ Route::is('setting.create') ? 'active' : '' }}"
                    href="{{ route('setting.create') }}"><i class="bx bx-cog me-1"></i>
                    Pengaturan Aplikasi</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::is('settingppdb.create') ? 'active' : '' }}"
                    href="{{ route('settingppdb.create') }}"><i class="bx bxl-whatsapp me-1"></i>
                    Pengaturan PPDB</a></li>
            <a href="{{ route('settingppdb.store') }}"></a>
        </ul>
    </div>
</div>
