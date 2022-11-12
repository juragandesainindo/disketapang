<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Disketapang | @yield('title')</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/mmc-chat.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminKit/vendor/select2/select2.min.css') }}" />
    <link href="{{ asset('assets/css/lib/simdahs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/simple-datatables/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/show-password/style.css') }}">


    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <style>
        .table th,
        .table td {
            color: #212529;
        }

        .table th {
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">

            <div class="nano-content">

                @if(Auth::user()->role_name=='Kadis Ketapang')
                <ul>
                    <br>
                    <li class="{{ request()->is('home') ? 'active' : '' }}">
                        <a href="{{ url('home') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="{{ request()->is('activity') ? 'active' : '' }}">
                        <a href="{{ url('activity') }}">
                            Aktifitas User
                        </a>
                    </li>

                    <li class="label">Sub Bagian Umum</li>
                    <li class="{{ (request()->is('pegawais')) ? 'active' : '' }}">
                        <a href="{{ url('pegawais') }}">
                            Profil Pegawai
                        </a>
                    </li>
                    <li class="{{ request()->is('sop') ? 'active' : '' }}">
                        <a href="{{ url('sop') }}">
                            SOP
                        </a>
                    </li>
                    <li class="{{ request()->is('peta-jabatan') ? 'active' : '' }}">
                        <a href="{{ url('peta-jabatan') }}">
                            Peta Jabatan
                        </a>
                    </li>
                    <li class="{{ request()->is('kendaraans') ? 'active' : '' }}">
                        <a href="{{ url('kendaraans') }}">
                            Data Kendaraan
                        </a>
                    </li>

                    <li class="label">Sub Bagian Keuangan</li>
                    <li class="{{ request()->is('referensi-tufoksi') ? 'active' : '' }}">
                        <a href="{{ url('referensi-tufoksi') }}">Referensi</a>
                    </li>
                    <li class="{{ request()->is('evaluasi-renstra') ? 'active' : '' }}">
                        <a href="{{ url('evaluasi-renstra') }}">Evaluasi Renstra</a>
                    </li>
                    <li class="{{ request()->is('laporan-realisasi') ? 'active' : '' }}">
                        <a href="{{ url('laporan-realisasi') }}">Laporan Realisasi</a>
                    </li>
                    <li class="{{ request()->is('dpa') ? 'active' : '' }}">
                        <a href="{{ url('dpa') }}">DPA</a>
                    </li>
                    <li class="{{ request()->is('laporan-keuangan') ? 'active' : '' }}">
                        <a href="{{ url('laporan-keuangan') }}">Laporan Keuangan</a>
                    </li>

                    <li class="label">Bidang Ketersediaan</li>
                    <li class="{{ request()->is('data-prognosa') ? 'active' : '' }}">
                        <a href="{{ url('data-prognosa') }}">Data Prognosa</a>
                    </li>
                    <li class="{{ request()->is('data-kelompok-tani') ? 'active' : '' }}">
                        <a href="{{ url('data-kelompok-tani') }}">Data Kelompok Tani</a>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            Penerima Manfaat Kamapan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ (request()->is('daftar-kamapan')) ? 'active' : '' }}">
                                <a href="{{ url('daftar-kamapan') }}">
                                    Daftar Penerima Manfaat
                                </a>
                            </li>
                            <li class="{{ request()->is('sk-penerima-manfaat') ? 'active' : '' }}">
                                <a href="{{ url('sk-penerima-manfaat') }}">
                                    SK Penerima Manfaat
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="label">Bidang Kerawanan</li>
                    <li class="{{ request()->is('skpg-bulanan') ? 'active' : '' }}">
                        <a href="{{ url('skpg-bulanan') }}">SKPG (Bulanan)</a>
                    </li>
                    <li class="{{ request()->is('peta-fsva') ? 'active' : '' }}">
                        <a href="{{ url('peta-fsva') }}">Peta FSVA (Tahunan)</a>
                    </li>

                    <li class="label">Bidang Distribusi</li>
                    <li class="{{ request()->is('unit-distributor') ? 'active' : '' }}">
                        <a href="{{ url('unit-distributor') }}">Unit Distributor</a>
                    </li>
                    <li class="{{ request()->is('harga-pangan') ? 'active' : '' }}">
                        <a href="{{ url('harga-pangan') }}">Harga Pangan</a>
                    </li>
                    <li class="{{ request()->is('pasar') ? 'active' : '' }}">
                        <a href="{{ url('pasar') }}">Pasar-Pasar</a>
                    </li>
                    <li class="{{ request()->is('daftar-gudang') ? 'active' : '' }}">
                        <a href="{{ url('daftar-gudang') }}">Daftar Gudang Makanan</a>
                    </li>
                    <li class="{{ request()->is('data-kampung-pangan') ? 'active' : '' }}">
                        <a href="{{ url('data-kampung-pangan') }}">Data Kampung Pangan</a>
                    </li>

                    <li class="label">Bidang Cadangan</li>
                    <li class="{{ request()->is('data-cadangan-pangan') ? 'active' : '' }}">
                        <a href="{{ url('data-cadangan-pangan') }}">Data Cadangan Pangan</a>
                    </li>
                    <li class="{{ request()->is('cadangan-bulog') ? 'active' : '' }}">
                        <a href="{{ url('cadangan-bulog') }}">Cadangan Beras di Bulog</a>
                    </li>

                    <li class="label">Keamanan Pangan</li>
                    <li class="{{ request()->is('data-keamanan-pangan-segar') ? 'active' : '' }}">
                        <a href="{{url('data-keamanan-pangan-segar')}}">Data Keamanan Pangan </a>
                    </li>
                    <li class="{{ request()->is('pengusul-sertifikasi') ? 'active' : '' }}">
                        <a href="{{url('pengusul-sertifikasi')}}">Pengusul Sertifikasi </a>
                    </li>

                    <li class="label">Penganekaragaman Konsumsi Pangan</li>
                    <li class="{{ request()->is('data-pangan-lokal') ? 'active' : '' }}">
                        <a href="{{url('data-pangan-lokal')}}">Data Pangan Lokal dan Olahan </a>
                    </li>

                    <li class="label">Konsumsi Pangan</li>
                    <li class="{{ request()->is('data-konsumsi-pangan') ? 'active' : '' }}">
                        <a href="{{url('data-konsumsi-pangan')}}">Data Konsumsi Pangan/Kapita </a>
                    </li>
                    <li class="{{ request()->is('kelompok-wanita-tani') ? 'active' : '' }}">
                        <a href="{{url('kelompok-wanita-tani')}}">Data KWT </a>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> Stimulus Bantuan KWT
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('kwt-proposal') ? 'active' : '' }}">
                                <a href="{{url('kwt-proposal')}}">Proposal </a>
                            </li>
                            <li class="{{ request()->is('kwt-spt') ? 'active' : '' }}">
                                <a href="{{url('kwt-spt')}}">SPT CP/CL </a>
                            </li>
                            <li class="{{ request()->is('kwt-verifikasi-cpcl') ? 'active' : '' }}">
                                <a href="{{url('kwt-verifikasi-cpcl')}}">Verifikasi CP/CL </a>
                            </li>
                            <li class="{{ request()->is('kwt-sk') ? 'active' : '' }}">
                                <a href="{{url('kwt-sk')}}">SK Penerima Manfaat </a>
                            </li>
                            <li class="{{ request()->is('kwt-berita-acara') ? 'active' : '' }}">
                                <a href="{{url('kwt-berita-acara')}}">Berita Acara </a>
                            </li>
                            <li class="{{ request()->is('kwt-monev') ? 'active' : '' }}">
                                <a href="{{url('kwt-monev')}}">Monitoring & Evaluasi </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <br><br><br><br><br>
                @endif


                @if(Auth::user()->role_name=='Super Admin')
                <ul>
                    <br>
                    <li class="label">Sekretariat</li>
                    <li class="{{ request()->is('home') ? 'active' : '' }}">
                        <a href="{{ url('home') }}">
                            <i class="ti-home"></i> Dashboard
                        </a>
                    </li>

                    <li class="{{ request()->is('data-user*') ? 'active' : '' }}">
                        <a href="{{ url('data-user') }}">
                            <i class="ti-user"></i> Data User
                        </a>
                    </li>

                    <li class="{{ request()->is('background-image*') ? 'active' : '' }}">
                        <a href="{{ url('background-image') }}">
                            <i class="ti-image"></i> Background Image Login
                        </a>
                    </li>

                    <li class="{{ request()->is('activity') ? 'active' : '' }}">
                        <a href="{{ url('activity') }}">
                            <i class="ti-user"></i> Aktifitas User
                        </a>
                    </li>

                    <style>
                        svg {
                            width: 20px;
                            height: 20px;
                        }

                        .icon:active {
                            fill: orange;
                        }

                        .link .name {
                            margin-left: 20px;
                        }
                    </style>

                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Sub Bagian Umum
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>

                            <li class="{{ (request()->is('pegawais')) ? 'active' : '' }}">
                                <a href="{{ url('pegawais') }}">
                                    <i class="ti-user"></i> Profil Pegawai
                                </a>
                            </li>
                            <li class="{{ request()->is('sop') ? 'active' : '' }}">
                                <a href="{{ url('sop') }}">
                                    <i class="ti-file"></i> SOP
                                </a>
                            </li>
                            <li class="{{ request()->is('peta-jabatan') ? 'active' : '' }}">
                                <a href="{{ url('peta-jabatan') }}">
                                    <i class="ti-map"></i> Peta Jabatan
                                </a>
                            </li>
                            <li class="{{ request()->is('kendaraans') ? 'active' : '' }}">
                                <a href="{{ url('kendaraans') }}">
                                    <i class="ti-car"></i> Data Kendaraan
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Sub Bagian Keuangan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('referensi-tufoksi') ? 'active' : '' }}">
                                <a href="{{ url('referensi-tufoksi') }}">Referensi</a>
                            </li>
                            <li class="{{ request()->is('evaluasi-renstra') ? 'active' : '' }}">
                                <a href="{{ url('evaluasi-renstra') }}">Evaluasi Renstra</a>
                            </li>
                            <li class="{{ request()->is('laporan-realisasi') ? 'active' : '' }}">
                                <a href="{{ url('laporan-realisasi') }}">Laporan Realisasi</a>
                            </li>
                            <li class="{{ request()->is('dpa') ? 'active' : '' }}">
                                <a href="{{ url('dpa') }}">DPA</a>
                            </li>
                            <li class="{{ request()->is('laporan-keuangan') ? 'active' : '' }}">
                                <a href="{{ url('laporan-keuangan') }}">Laporan Keuangan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="label">Ketersediaan & Kerawanan</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Bidang Ketersediaan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('data-prognosa') ? 'active' : '' }}">
                                <a href="{{ url('data-prognosa') }}">Data Prognosa</a>
                            </li>
                            <li class="{{ request()->is('data-kelompok-tani') ? 'active' : '' }}">
                                <a href="{{ url('data-kelompok-tani') }}">Data Kelompok Tani</a>
                            </li>
                            <li>
                                <a class="sidebar-sub-toggle">
                                    Penerima Manfaat Kamapan
                                    <span class="sidebar-collapse-icon ti-angle-down"></span>
                                </a>
                                <ul>
                                    <li class="{{ (request()->is('daftar-kamapan')) ? 'active' : '' }}">
                                        <a href="{{ url('daftar-kamapan') }}">
                                            Daftar Penerima Manfaat
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('sk-penerima-manfaat') ? 'active' : '' }}">
                                        <a href="{{ url('sk-penerima-manfaat') }}">
                                            SK Penerima Manfaat
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Bidang Kerawanan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('skpg-bulanan') }}">SKPG (Bulanan)</a>
                            </li>
                            <li>
                                <a href="{{ url('peta-fsva') }}">Peta FSVA (Tahunan)</a>
                            </li>
                        </ul>
                    </li>

                    <li class="label">Distribusi & Cadangan</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Bidang Distribusi
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('unit-distributor') ? 'active' : '' }}">
                                <a href="{{ url('unit-distributor') }}">Unit Distributor</a>
                            </li>
                            <li class="{{ request()->is('harga-pangan') ? 'active' : '' }}">
                                <a href="{{ url('harga-pangan') }}">Harga Pangan</a>
                            </li>
                            <li class="{{ request()->is('pasar') ? 'active' : '' }}">
                                <a href="{{ url('pasar') }}">Pasar-Pasar</a>
                            </li>
                            <li class="{{ request()->is('daftar-gudang') ? 'active' : '' }}">
                                <a href="{{ url('daftar-gudang') }}">Daftar Gudang Makanan</a>
                            </li>
                            <li class="{{ request()->is('data-kampung-pangan') ? 'active' : '' }}">
                                <a href="{{ url('data-kampung-pangan') }}">Data Kampung Pangan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Bidang Cadangan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('data-cadangan-pangan') ? 'active' : '' }}">
                                <a href="{{ url('data-cadangan-pangan') }}">Data Cadangan Pangan</a>
                            </li>
                            <li>
                                <a href="{{ url('cadangan-bulog') }}">Cadangan Beras di Bulog</a>
                            </li>
                        </ul>
                    </li>

                    <li class="label">Konsumsi & Keamanan</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-layout-grid4"></i> Bidang Konsumsi
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('data-keamanan-pangan-segar') ? 'active' : '' }}">
                                <a href="{{url('data-keamanan-pangan-segar')}}">Data Keamanan Pangan </a>
                            </li>
                            <li class="{{ request()->is('pengusul-sertifikasi') ? 'active' : '' }}">
                                <a href="{{url('pengusul-sertifikasi')}}">Pengusul Sertifikasi </a>
                            </li>
                            <li class="{{ request()->is('data-pangan-lokal') ? 'active' : '' }}">
                                <a href="{{url('data-pangan-lokal')}}">Data Pangan Lokal dan Olahan </a>
                            </li>
                            <li class="{{ request()->is('data-konsumsi-pangan') ? 'active' : '' }}">
                                <a href="{{url('data-konsumsi-pangan')}}">Data Konsumsi Pangan/Kapita </a>
                            </li>
                            <li class="{{ request()->is('kelompok-wanita-tani') ? 'active' : '' }}">
                                <a href="{{url('kelompok-wanita-tani')}}">Data KWT </a>
                            </li>
                            <li>
                                <a class="sidebar-sub-toggle"> Penerima Manfaat Kamapan
                                    <span class="sidebar-collapse-icon ti-angle-down"></span>
                                </a>
                                <ul>
                                    <li class="{{ request()->is('penerima-manfaat-kwt') ? 'active' : '' }}">
                                        <a href="{{url('penerima-manfaat-kwt')}}">Daftar Penerima Manfaat </a>
                                    </li>
                                    <li class="{{ request()->is('kwt-proposal') ? 'active' : '' }}">
                                        <a href="{{url('kwt-proposal')}}">Proposal </a>
                                    </li>
                                    <li class="{{ request()->is('kwt-spt') ? 'active' : '' }}">
                                        <a href="{{url('kwt-spt')}}">SPT CP/CL </a>
                                    </li>
                                    <li class="{{ request()->is('kwt-verifikasi-cpcl') ? 'active' : '' }}">
                                        <a href="{{url('kwt-verifikasi-cpcl')}}">Verifikasi CP/CL </a>
                                    </li>
                                    <li class="{{ request()->is('kwt-sk') ? 'active' : '' }}">
                                        <a href="{{url('kwt-sk')}}">SK Penerima Manfaat </a>
                                    </li>
                                    <li class="{{ request()->is('kwt-berita-acara') ? 'active' : '' }}">
                                        <a href="{{url('kwt-berita-acara')}}">Berita Acara </a>
                                    </li>
                                    <li class="{{ request()->is('kwt-monev') ? 'active' : '' }}">
                                        <a href="{{url('kwt-monev')}}">Monitoring & Evaluasi </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif


                @if(Auth::user()->role_name=='Kasub Bagian Umum')
                <ul>
                    <li class="label">Sub Bagian Umum</li>
                    <li class="{{ (request()->is('pegawais')) ? 'active' : '' }}">
                        <a href="{{ url('pegawais') }}">
                            <i class="ti-user"></i> Profil Pegawai
                        </a>
                    </li>
                    <li class="{{ request()->is('sop') ? 'active' : '' }}">
                        <a href="{{ url('sop') }}">
                            <i class="ti-file"></i> SOP
                        </a>
                    </li>
                    <li class="{{ request()->is('peta-jabatan') ? 'active' : '' }}">
                        <a href="{{ url('peta-jabatan') }}">
                            <i class="ti-map"></i> Peta Jabatan
                        </a>
                    </li>
                    <li class="{{ request()->is('kendaraans') ? 'active' : '' }}">
                        <a href="{{ url('kendaraans') }}">
                            <i class="ti-car"></i> Data Kendaraan
                        </a>
                    </li>
                    <li class="{{ request()->is('kib-a','kib-b') ? 'active open' : '' }}">
                        <a class="sidebar-sub-toggle">
                            <i class="ti-agenda"></i> Asset
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>

                            <li class="{{ (request()->is('kib-a')) ? 'active' : '' }}">
                                <a href="{{ url('kib-a') }}">
                                    <i class="ti-clipboard"></i> KIB A
                                </a>
                            </li>
                            <li class="{{ (request()->is('kib-b')) ? 'active' : '' }}">
                                <a href="{{ url('kib-b') }}">
                                    <i class="ti-clipboard"></i> KIB B
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasub Bagian Keuangan')
                <ul>
                    <li class="label">Sub Bagian Keuangan</li>
                    <li class="{{ request()->is('referensi-tufoksi') ? 'active' : '' }}">
                        <a href="{{ url('referensi-tufoksi') }}">Referensi</a>
                    </li>
                    <li class="{{ request()->is('evaluasi-renstra') ? 'active' : '' }}">
                        <a href="{{ url('evaluasi-renstra') }}"><i class="ti-layout-grid4"></i> Evaluasi Renstra</a>
                    </li>
                    <li class="{{ request()->is('laporan-realisasi') ? 'active' : '' }}">
                        <a href="{{ url('laporan-realisasi') }}"><i class="ti-layout-grid4"></i> Laporan Realisasi</a>
                    </li>
                    <li class="{{ request()->is('dpa') ? 'active' : '' }}">
                        <a href="{{ url('dpa') }}"><i class="ti-layout-grid4"></i> DPA</a>
                    </li>
                    <li class="{{ request()->is('laporan-keuangan') ? 'active' : '' }}">
                        <a href="{{ url('laporan-keuangan') }}"><i class="ti-layout-grid4"></i> Laporan Keuangan</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kabid Ketersediaan dan Kerawanan Pangan')
                <ul>
                    <li class="label">Ketersediaan Pangan</li>
                    <li class="{{ (request()->is('data-prognosa')) ? 'active' : '' }}">
                        <a href="{{ url('data-prognosa') }}">Data Prognosa</a>
                    </li>

                    <li class="label">Sumber Daya Pangan</li>
                    <li class="{{ (request()->is('data-kelompok-tani')) ? 'active' : '' }}">
                        <a href="{{ url('data-kelompok-tani') }}">Data Kelompok Tani</a>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            Penerima Manfaat Kamapan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ (request()->is('daftar-kamapan')) ? 'active' : '' }}">
                                <a href="{{ url('daftar-kamapan') }}">
                                    Daftar Penerima Manfaat
                                </a>
                            </li>
                            <li class="{{ request()->is('sk-penerima-manfaat') ? 'active' : '' }}">
                                <a href="{{ url('sk-penerima-manfaat') }}">
                                    SK Penerima Manfaat
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="label">Kerawanan Pangan</li>
                    <li class="{{ (request()->is('skpg-bulanan')) ? 'active' : '' }}">
                        <a href="{{ url('skpg-bulanan') }}">SKPG (Bulanan)</a>
                    </li>
                    <li class="{{ (request()->is('peta-fsva')) ? 'active' : '' }}">
                        <a href="{{ url('peta-fsva') }}">Peta FSVA (Tahunan)</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kabid Distribusi dan Cadangan Pangan')
                <ul>
                    <li class="label">Distribusi Pangan</li>
                    <li class="{{ request()->is('unit-distributor') ? 'active' : '' }}">
                        <a href="{{ url('unit-distributor') }}">Unit Distributor</a>
                    </li>
                    <li class="{{ request()->is('pasar') ? 'active' : '' }}">
                        <a href="{{ url('pasar') }}">Pasar-Pasar</a>
                    </li>
                    <li class="{{ request()->is('daftar-gudang') ? 'active' : '' }}">
                        <a href="{{ url('daftar-gudang') }}">Daftar Gudang Makanan</a>
                    </li>
                    <li class="{{ request()->is('data-kampung-pangan') ? 'active' : '' }}">
                        <a href="{{ url('data-kampung-pangan') }}">Data Kampung Pangan</a>
                    </li>

                    <li class="label">Harga Pangan</li>
                    <li class="{{ request()->is('harga-pangan') ? 'active' : '' }}">
                        <a href="{{ url('harga-pangan') }}">Harga Pangan</a>
                    </li>

                    <li class="label">Cadangan Pangan</li>
                    <li class="{{ request()->is('data-cadangan-pangan') ? 'active' : '' }}">
                        <a href="{{ url('data-cadangan-pangan') }}">Data Cadangan Pangan</a>
                    </li>
                    <li>
                        <a href="{{ url('cadangan-bulog') }}">Cadangan Beras di Bulog</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kabid Konsumsi dan Keamanan Pangan')
                <ul>
                    <li class="label">Keamanan Pangan</li>
                    <li class="{{ request()->is('data-keamanan-pangan-segar') ? 'active' : '' }}">
                        <a href="{{url('data-keamanan-pangan-segar')}}">Data Keamanan Pangan </a>
                    </li>
                    <li class="{{ request()->is('pengusul-sertifikasi') ? 'active' : '' }}">
                        <a href="{{url('pengusul-sertifikasi')}}">Pengusul Sertifikasi </a>
                    </li>

                    <li class="label">Penganekaragaman Konsumsi Pangan</li>
                    <li class="{{ request()->is('data-pangan-lokal') ? 'active' : '' }}">
                        <a href="{{url('data-pangan-lokal')}}">Data Pangan Lokal dan Olahan </a>
                    </li>

                    <li class="label">Konsumsi Pangan</li>
                    <li class="{{ request()->is('data-konsumsi-pangan') ? 'active' : '' }}">
                        <a href="{{url('data-konsumsi-pangan')}}">Data Konsumsi Pangan/Kapita </a>
                    </li>
                    <li class="{{ request()->is('kelompok-wanita-tani') ? 'active' : '' }}">
                        <a href="{{url('kelompok-wanita-tani')}}">Data KWT </a>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> Penerima Manfaat Kamapan
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('penerima-manfaat-kwt') ? 'active' : '' }}">
                                <a href="{{url('penerima-manfaat-kwt')}}">Daftar Penerima Manfaat </a>
                            </li>
                            <li class="{{ request()->is('kwt-proposal') ? 'active' : '' }}">
                                <a href="{{url('kwt-proposal')}}">Proposal </a>
                            </li>
                            <li class="{{ request()->is('kwt-spt') ? 'active' : '' }}">
                                <a href="{{url('kwt-spt')}}">SPT CP/CL </a>
                            </li>
                            <li class="{{ request()->is('kwt-verifikasi-cpcl') ? 'active' : '' }}">
                                <a href="{{url('kwt-verifikasi-cpcl')}}">Verifikasi CP/CL </a>
                            </li>
                            <li class="{{ request()->is('kwt-sk') ? 'active' : '' }}">
                                <a href="{{url('kwt-sk')}}">SK Penerima Manfaat </a>
                            </li>
                            <li class="{{ request()->is('kwt-berita-acara') ? 'active' : '' }}">
                                <a href="{{url('kwt-berita-acara')}}">Berita Acara </a>
                            </li>
                            <li class="{{ request()->is('kwt-monev') ? 'active' : '' }}">
                                <a href="{{url('kwt-monev')}}">Monitoring & Evaluasi </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Ketersediaan Pangan')
                <ul>
                    <li class="label">Ketersediaan Pangan</li>
                    <li class="{{ (request()->is('data-prognosa')) ? 'active' : '' }}">
                        <a href="{{ url('data-prognosa') }}">Data Prognosa</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Sumber Daya Pangan')
                <ul>
                    <li class="label">Sumber Daya Pangan</li>
                    <li class="{{ (request()->is('data-kelompok-tani')) ? 'active' : '' }}">
                        <a href="{{ url('data-kelompok-tani') }}">Data Kelompok Tani</a>
                    </li>

                    <li class="label">Penerima Manfaat Kamapan</li>
                    <li class="{{ (request()->is('daftar-kamapan')) ? 'active' : '' }}">
                        <a href="{{ url('daftar-kamapan') }}">
                            Daftar Penerima Manfaat
                        </a>
                    </li>
                    <li class="{{ (request()->is('proposal-kamapan')) ? 'active' : '' }}">
                        <a href="{{ url('proposal-kamapan') }}">
                            Proposal
                        </a>
                    </li>
                    <li class="{{ (request()->is('spt-cpcl')) ? 'active' : '' }}">
                        <a href="{{ url('spt-cpcl') }}">
                            SPT CP/CL
                        </a>
                    </li>
                    <li class="{{ (request()->is('verifikasi-cpcl')) ? 'active' : '' }}">
                        <a href="{{ url('verifikasi-cpcl') }}">
                            Verifikasi CP/CL
                        </a>
                    </li>
                    <li class="{{ request()->is('sk-penerima-manfaat') ? 'active' : '' }}">
                        <a href="{{ url('sk-penerima-manfaat') }}">
                            SK Penerima Manfaat
                        </a>
                    </li>
                    <li class="{{ request()->is('berita-acara') ? 'active' : '' }}">
                        <a href="{{ url('berita-acara') }}">
                            Berita Acara
                        </a>
                    </li>
                    <li class="{{ request()->is('monev-kamapan') ? 'active' : '' }}">
                        <a href="{{ url('monev-kamapan') }}">
                            Monev
                        </a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Kerawanan Pangan')
                <ul>
                    <li class="label">Kerawanan Pangan</li>
                    <li class="{{ (request()->is('skpg-bulanan')) ? 'active' : '' }}">
                        <a href="{{ url('skpg-bulanan') }}">SKPG (Bulanan)</a>
                    </li>
                    <li class="{{ (request()->is('peta-fsva')) ? 'active' : '' }}">
                        <a href="{{ url('peta-fsva') }}">Peta FSVA (Tahunan)</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Distribusi Pangan')
                <ul>
                    <li class="label">Distribusi Pangan</li>
                    <li class="{{ request()->is('unit-distributor') ? 'active' : '' }}">
                        <a href="{{ url('unit-distributor') }}">Unit Distributor</a>
                    </li>
                    <li class="{{ request()->is('pasar') ? 'active' : '' }}">
                        <a href="{{ url('pasar') }}">Pasar-Pasar</a>
                    </li>
                    <li class="{{ request()->is('daftar-gudang') ? 'active' : '' }}">
                        <a href="{{ url('daftar-gudang') }}">Daftar Gudang Makanan</a>
                    </li>
                    <li class="{{ request()->is('data-kampung-pangan') ? 'active' : '' }}">
                        <a href="{{ url('data-kampung-pangan') }}">Data Kampung Pangan</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Harga Pangan')
                <ul>
                    <li class="label">Harga Pangan</li>
                    <li class="{{ request()->is('harga-pangan') ? 'active' : '' }}">
                        <a href="{{ url('harga-pangan') }}">Harga Pangan</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Cadangan Pangan')
                <ul>
                    <li class="label">Cadangan Pangan</li>
                    <li class="{{ request()->is('data-cadangan-pangan') ? 'active' : '' }}">
                        <a href="{{ url('data-cadangan-pangan') }}">Data Cadangan Pangan</a>
                    </li>
                    <li>
                        <a href="{{ url('cadangan-bulog') }}">Cadangan Beras di Bulog</a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Keamanan Pangan')
                <ul>
                    <li class="label">Keamanan Pangan</li>
                    <li class="{{ request()->is('data-keamanan-pangan-segar') ? 'active' : '' }}">
                        <a href="{{url('data-keamanan-pangan-segar')}}">Data Keamanan Pangan </a>
                    </li>
                    <li class="{{ request()->is('pengusul-sertifikasi') ? 'active' : '' }}">
                        <a href="{{url('pengusul-sertifikasi')}}">Pengusul Sertifikasi </a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Penganekaragaman Konsumsi Pangan')
                <ul>
                    <li class="label">Penganekaragaman Konsumsi Pangan</li>
                    <li class="{{ request()->is('data-pangan-lokal') ? 'active' : '' }}">
                        <a href="{{url('data-pangan-lokal')}}">Data Pangan Lokal dan Olahan </a>
                    </li>
                </ul>
                @endif

                @if(Auth::user()->role_name=='Kasi Konsumsi Pangan')
                <ul>
                    <li class="label">Konsumsi Pangan</li>
                    <li class="{{ request()->is('data-konsumsi-pangan') ? 'active' : '' }}">
                        <a href="{{url('data-konsumsi-pangan')}}">Data Konsumsi Pangan/Kapita </a>
                    </li>
                    <li class="{{ request()->is('kelompok-wanita-tani') ? 'active' : '' }}">
                        <a href="{{url('kelompok-wanita-tani')}}">Data KWT </a>
                    </li>
                    <li class="label">Penerima Manfaat Kamapan</li>
                    <li class="{{ request()->is('penerima-manfaat-kwt') ? 'active' : '' }}">
                        <a href="{{url('penerima-manfaat-kwt')}}">Daftar Penerima Manfaat </a>
                    </li>
                    <li class="{{ request()->is('kwt-proposal') ? 'active' : '' }}">
                        <a href="{{url('kwt-proposal')}}">Proposal </a>
                    </li>
                    <li class="{{ request()->is('kwt-spt') ? 'active' : '' }}">
                        <a href="{{url('kwt-spt')}}">SPT CP/CL </a>
                    </li>
                    <li class="{{ request()->is('kwt-verifikasi-cpcl') ? 'active' : '' }}">
                        <a href="{{url('kwt-verifikasi-cpcl')}}">Verifikasi CP/CL </a>
                    </li>
                    <li class="{{ request()->is('kwt-sk') ? 'active' : '' }}">
                        <a href="{{url('kwt-sk')}}">SK Penerima Manfaat </a>
                    </li>
                    <li class="{{ request()->is('kwt-berita-acara') ? 'active' : '' }}">
                        <a href="{{url('kwt-berita-acara')}}">Berita Acara </a>
                    </li>
                    <li class="{{ request()->is('kwt-monev') ? 'active' : '' }}">
                        <a href="{{url('kwt-monev')}}">Monitoring & Evaluasi </a>
                    </li>
                </ul>
                @endif

            </div>

        </div>
    </div><!-- /# sidebar -->




    <div class="header">
        <div class="pull-left">
            <div class="logo" id="sideLogo">
                <!--<span class="full-logo">Disketapang</span>-->
                <a href="">
                    <img class="full-logo" src="{{ asset('assets/sitangan2.png') }}" style="width: 150px;">
                    {{-- <img class="small-logo" src="{{ asset('assets/logo-sitangan.png') }}" alt="SimDahs"> --}}
                </a>
            </div>
            <div class="hamburger sidebar-toggle">
                <span class="ti-menu"></span>
            </div>
        </div>

        <div class="pull-right p-r-15">
            @include('menu.navbar')
        </div>
    </div>

    <div class="chat-sidebar">
        <!-- BEGIN chat -->
        <div id="mmc-chat" class="color-default">
            <!-- BEGIN CHAT BOX -->
            <div class="chat-box">
                <!-- BEGIN CHAT BOXS -->
                <ul class="boxs"></ul>
                <!-- END CHAT BOXS -->
                <div class="icons-set">
                    <div class="stickers">
                        <div class="had-container">
                            <div class="row">
                                <div class="s12">
                                    <ul class="tabs" style="width: 100%;height: 60px;">
                                        <li class="tab col s3">
                                            <a href="#tab1" class="active">
                                                <img src="images/1.png" alt="" />
                                            </a>
                                        </li>
                                        <li class="tab col s3"><a href="#tab2">Test 2</a></li>
                                    </ul>
                                </div>
                                <div id="tab1" class="s12 tab-content">
                                    <ul>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                        <li><img src="images/1.png" alt="" /></li>
                                    </ul>
                                </div>
                                <div id="tab2" class="s12 tab-content">Test 2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CHAT BOX -->
            <!-- BEGIN SIDEBAR -->
            <div id="sidebar" class="right scroll">
                <div class="had-container">
                    <!-- BEGIN USERS -->
                    <div class="users">

                        <ul class="user-list">
                            <!-- BEGIN USER-->
                            <li class="user-tooltip" data-id="1" data-status="online" data-username="Rufat Askerov"
                                data-position="left" data-filter-item data-filter-name="rufat askerov">
                                <!-- BEGIN USER IMAGE-->
                                <div class="user-image">
                                    <img src="assets/images/avatar/1.jpg" class="avatar" alt="Rufat Askerov" />
                                </div>
                                <!-- END USER IMAGE-->
                                <!-- BEGIN USERNAME-->
                                <span class="user-name">Rufat Askerov</span>
                                <span class="user-show"></span>
                                <!-- END USERNAME-->
                            </li>
                            <!-- END USER-->
                            <!-- BEGIN USER-->
                            <li class="user-tooltip" data-id="3" data-status="online" data-username="Alice"
                                data-position="left" data-filter-item data-filter-name="alice">
                                <div class="user-image">
                                    <img src="assets/images/avatar/1.jpg" class="avatar" alt="Alice" />
                                </div>
                                <span class="user-name">Alice</span>
                                <span class="user-show"></span>
                            </li>

                            <!-- BEGIN USER-->
                            <li class="user-tooltip" data-id="7" data-status="offline" data-username="Michael Scofield"
                                data-position="left" data-filter-item data-filter-name="michael scofield">
                                <div class="user-image">
                                    <img src="assets/images/avatar/1.jpg" class="avatar" alt="Michael Scofield" />
                                </div>
                                <span class="user-name">Michael Scofield</span>
                                <span class="user-show"></span>
                            </li>

                            <!-- BEGIN USER-->
                            <li class="user-tooltip" data-id="5" data-status="online" data-username="Irina Shayk"
                                data-position="left" data-filter-item data-filter-name="irina shayk">
                                <div class="user-image">
                                    <img src="assets/images/avatar/1.jpg" class="avatar" alt="Irina Shayk" />
                                </div>
                                <span class="user-name">Irina Shayk</span>
                                <span class="user-show"></span>
                            </li>

                            <!-- BEGIN USER-->
                            <li class="user-tooltip" data-id="6" data-status="offline" data-username="Sara Tancredi"
                                data-position="left" data-filter-item data-filter-name="sara tancredi">
                                <div class="user-image">
                                    <img src="assets/images/avatar/1.jpg" class="avatar" alt="Sara Tancredi" />
                                </div>
                                <span class="user-name">Sara Tancredi</span>
                                <span class="user-show"></span>
                            </li>

                            <!-- BEGIN USER-->
                            <li class="user-tooltip" data-id="7" data-status="offline" data-username="Wolf"
                                data-position="left" data-filter-item data-filter-name="Wolf">
                                <div class="user-image">
                                    <img src="assets/images/avatar/1.jpg" class="avatar" alt="Wolf" />
                                </div>
                                <span class="user-name">Wolf</span>
                                <span class="user-show"></span>
                            </li>
                        </ul>
                        <div class="chat-user-search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ti-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search" data-search />
                            </div>
                        </div>
                    </div>
                    <!-- END USERS -->

                </div>
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END chat -->
    </div>
    <!-- END chat Sidebar-->

    <div class="content-wrap">
        @yield('content')

        <div class="modal fade" id="coba" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <strong style="font-size: 18px;">Tambah SOP</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        a
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#coba').modal('show');
        </script>
        <!-- /# main -->
    </div><!-- /# content wrap -->



    <script src="{{ asset('assets/simple-datatables/simple-datatables.js') }}"></script>


    <!-- jquery vendor -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- nano scroller -->
    <script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>

    <!-- sidebar -->
    <script src="{{ asset('assets/js/lib/sidebar.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/js/lib/sweetalert/sweetalert.min.js') }}"></script><!-- scripit init-->
    <script src="{{ asset('assets/js/lib/sweetalert/sweetalert.init.js') }}"></script><!-- scripit init-->
    <script src="{{ asset('adminKit/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('adminKit/js/select2.js') }}"></script>
    <script src="{{ asset('adminKit/js/jquery.maskMoney.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script><!-- scripit init-->


    <script src="{{ asset('assets/show-password/jquery-3.6.0.min.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script type="text/javascript">
        $(document).ready(function(){       
                    $('.form-checkbox').click(function(){
                        if($(this).is(':checked')){
                            $('.form-password').attr('type','text');
                        }else{
                            $('.form-password').attr('type','password');
                        }
                    });
                });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('select').selectpicker();
    });
    </script>

    @stack('js')
</body>

</html>