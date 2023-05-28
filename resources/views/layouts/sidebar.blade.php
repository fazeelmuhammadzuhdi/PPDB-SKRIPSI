<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        {{-- <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path
                            d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                            id="path-1"></path>
                        <path
                            d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                            id="path-3"></path>
                        <path
                            d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                            id="path-4"></path>
                        <path
                            d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                            id="path-5"></path>
                    </defs>
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <mask id="mask-2" fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                    <g id="Path-3" mask="url(#mask-2)">
                                        <use fill="#696cff" xlink:href="#path-3"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                    </g>
                                    <g id="Path-4" mask="url(#mask-2)">
                                        <use fill="#696cff" xlink:href="#path-4"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                    </g>
                                </g>
                                <g id="Triangle"
                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize">PPDB</span>
        </a> --}}
        @if (Auth::user()->akses == 'Admin Dinas' || Auth::user()->akses == 'Admin Sekolah')
            <a href="{{ route('dashboard_dinas') }}" class="app-brand-link">
                <img src="{{ Storage::url(settings()->get('app_logo')) }}" alt="" width="200">
            </a>
        @endif

        @if (Auth::user()->akses == 'Siswa')
            <a href="{{ route('dashboard_siswa') }}" class="app-brand-link">
                <img src="{{ Storage::url(settings()->get('app_logo')) }}" alt="" width="200">
            </a>
        @endif



        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->

        @if (Auth::user()->akses == 'Admin Dinas')
            <li class="menu-item {{ Route::is('dashboard_dinas') ? 'active' : '' }}">
                <a href="{{ route('dashboard_dinas') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('setting.*') || Route::is('settingppdb.*') ? 'active' : '' }}">
                <a href="{{ route('setting.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div data-i18n="Basic">Pengaturan Applikasi</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Data</span>
            </li>

            <li
                class="menu-item {{ Route::is('user.*') || Route::is('user_siswa.*') || Route::is('user-sekolah.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                    <div>Master User</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('user.*') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Admin</div>
                        </a>

                    </li>
                    <li class="menu-item {{ Route::is('user-sekolah.*') ? 'active' : '' }}">
                        <a href="{{ route('user-sekolah.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data User Sekolah</div>
                        </a>

                    </li>
                    <li class="menu-item {{ Route::is('user_siswa*') ? 'active' : '' }}">
                        <a href="{{ route('user_siswa.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data User Siswa</div>
                        </a>
                    </li>
                </ul>
            </li>


            <li
                class="menu-item {{ Route::is('sekolah.*') || Route::is('data_zonasi_sekolah.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                    <div>Master Sekolah</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('sekolah.*') ? 'active' : '' }}">
                        <a href="{{ route('sekolah.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Sekolah</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('data_zonasi_sekolah.*') ? 'active' : '' }}">
                        <a href="{{ route('data_zonasi_sekolah.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Zonasi Sekolah</div>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="menu-item {{ Route::is('penghasilan.*') || Route::is('pekerjaan.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                    <div>Master Input Siswa</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('penghasilan.index') ? 'active' : '' }}">
                        <a href="{{ route('penghasilan.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Penghasilan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('pekerjaan.index') ? 'active' : '' }}">
                        <a href="{{ route('pekerjaan.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Pekerjaan</div>
                        </a>
                    </li>
                </ul>
            </li>


            <li
                class="menu-item {{ Route::is('kecamatan.*') || Route::is('nagari.*') || Route::is('kampung.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                    <div>Master Zonasi</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('kecamatan.index') ? 'active' : '' }}">
                        <a href="{{ route('kecamatan.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Kecamatan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('nagari.index') ? 'active' : '' }}">
                        <a href="{{ route('nagari.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Nagari</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('kampung.*') ? 'active' : '' }}">
                        <a href="{{ route('kampung.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Data Kampung</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                    <div>Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.userAdminDanSekolah') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan Admin Dan User Sekolah</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.userSiswa') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan User Siswa</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.dataSekolah') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan Data Sekolah</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.kecamatan') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan Data Kecamatan</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.nagari') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan Data Nagari</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.kampung') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan Data Kampung</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('laporan.*') ? 'active' : '' }}">
                        <a href="{{ route('laporan.kecamatanNagariKampung') }}" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Laporan Kecamatan Nagari Dan Kampung</div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item {{ Route::is('kelulusan.*') ? 'active' : '' }}">
                <a href="{{ route('kelulusan.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div data-i18n="Basic">Kelulusan</div>
                </a>
            </li>
        @elseif (Auth::user()->akses == 'Admin Sekolah')
            <li class="menu-item {{ Route::is('dashboard_dinas') ? 'active' : '' }}">
                <a href="{{ route('dashboard_dinas') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('user-sekolah.*') ? 'active' : '' }}">
                <a href="{{ route('user-sekolah.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Data Admin Sekolah</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('zonasisekolah.*') ? 'active' : '' }}">
                <a href="{{ route('zonasisekolah.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Data Zonasi Sekolah</div>
                </a>
            </li>
            <li
                class="menu-item {{ Route::is('data_pendaftaran_prestasi.*') || Route::is('data_pendaftaran_afirmasi.*') || Route::is('data_pendaftaran_zonasi.*') || Route::is('data_pendaftaran_pindah_tugas.*') || Route::is('data_pendaftaran_prestasi.*') ? 'active' : '' }}">
                <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Data PPDB</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('lulus') ? 'active' : '' }}">
                <a href="{{ route('lulus') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Laporan Siswa Lulus</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('ditolak') ? 'active' : '' }}">
                <a href="{{ route('ditolak') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Laporan Siswa Yang Ditolak</div>
                </a>
            </li>
        @else
            <li class="menu-item {{ Route::is('dashboard_siswa') ? 'active' : '' }}">
                <a href="{{ route('dashboard_siswa') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('siswa.*') ? 'active' : '' }}">
                <a href="{{ route('siswa.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Biodata Siswa</div>
                </a>
            </li>
            <li
                class="menu-item {{ Route::is('jalur_pendaftaran') || Route::is('prestasi.*') || Route::is('afirmasi.*') || Route::is('pindahtugas.*') || Route::is('zonasi.*') ? 'active' : '' }}">
                <a href="{{ route('jalur_pendaftaran') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Pendaftaran</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('cek') ? 'active' : '' }}">
                <a href="{{ route('cek') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Hasil Pengumuman</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
