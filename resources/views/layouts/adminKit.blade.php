<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('adminKit') }}/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('adminKit') }}/vendor/select2/select2.min.css" />

    <link href="{{ asset('adminKit') }}/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="">
                    <span class="align-middle">Sitangan Disketapang</span>
                </a>

                <ul class="sidebar-nav pb-5">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('home') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('pegawais*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('pegawais') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Pegawai</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('sop*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('sop') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">SOP</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('peta-jabatan*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('peta-jabatan') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Peta
                                Jabatan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('kendaraans*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('kendaraans') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Kendaraan</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Kumpulan Asset
                    </li>
                    <li
                        class="sidebar-item {{ request()->is(['kib-a*','kib-b*','kib-c*','kib-d*','kib-e*','kib-f*','asset-tak-berwujud*']) ? 'active' : '' }}">
                        <a data-bs-target="#kumpulan-asset" data-bs-toggle="collapse" class="sidebar-link">
                            <span class="d-flex">
                                <i class="align-middle" data-feather="box"></i>
                                <div class="d-flex justify-content-between">
                                    Asset
                                    <i class="align-middle" data-feather="chevron-down"></i>
                                </div>
                            </span>
                        </a>


                        <ul id="kumpulan-asset"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is(['kib-a*','kib-b*','kib-c*','kib-d*','kib-e*','kib-f*','asset-tak-berwujud*']) ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('kib-a*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('kib-a') }}">
                                    <i class="align-middle" data-feather="circle"></i>
                                    <span class="align-middle">KibA</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('kib-b*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('kib-b') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibB</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('kib-c*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('kib-c') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibC</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('kib-d*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('kib-d') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibD</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('kib-e*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('kib-e') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibE</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('kib-f*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('kib-f') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibF</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('asset-tak-berwujud*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('asset-tak-berwujud') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">ATB</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-header">
                        Perawatan Asset
                    </li>
                    <li
                        class="sidebar-item {{ request()->is(['perawatan-asset-kib-a*','perawatan-asset-kib-b*','perawatan-asset-kib-c*','perawatan-asset-kib-d*','perawatan-asset-kib-e*','perawatan-asset-kib-f*','perawatan-asset-tak-berwujud*']) ? 'active' : '' }}">
                        <a data-bs-target="#perawatan-asset" data-bs-toggle="collapse" class="sidebar-link">
                            <span class="d-flex">
                                <i class="align-middle" data-feather="box"></i>
                                <div class="d-flex justify-content-between">
                                    Perawatan Asset
                                    <i class="align-middle" data-feather="chevron-down"></i>
                                </div>
                            </span>
                        </a>


                        <ul id="perawatan-asset"
                            class="sidebar-dropdown list-unstyled collapse {{ request()->is(['perawatan-asset-kib-a*','perawatan-asset-kib-b*','perawatan-asset-kib-c*','perawatan-asset-kib-d*','perawatan-asset-kib-e*','perawatan-asset-kib-f*','perawatan-asset-tak-berwujud*']) ? 'show' : '' }}"
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('perawatan-asset-kib-a*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-kib-a') }}">
                                    <i class="align-middle" data-feather="circle"></i>
                                    <span class="align-middle">KibA</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('perawatan-asset-kib-b*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-kib-b') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibB</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('perawatan-asset-kib-c*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-kib-c') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibC</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('perawatan-asset-kib-d*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-kib-d') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibD</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('perawatan-asset-kib-e*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-kib-e') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibE</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('perawatan-asset-kib-f*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-kib-f') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">KibF</span>
                                </a>
                            </li>
                            <li
                                class="sidebar-item {{ request()->is('perawatan-asset-tak-berwujud*') ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ url('perawatan-asset-tak-berwujud') }}">
                                    <i class="align-middle" data-feather="circle"></i> <span
                                        class="align-middle">ATB</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-header">
                        Laporan
                    </li>
                    <li class="sidebar-item {{ request()->is('laporan-rekon*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('laporan-rekon') }}">
                            <i class="align-middle" data-feather="file"></i>
                            <span class="align-middle">Laporan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                {{-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1"
                                    alt="Charles Hall" /> --}}
                                <i class="align-middle me-1" data-feather="user"></i>
                                <span class="text-dark">{{ Auth::user()->role_name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1"
                                        data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                    out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted">
                                    <strong>Sitangan</strong>
                                </a> -
                                <a class="text-muted">
                                    <strong>Dinas Ketahanan Pangan Kota Pekanbaru</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted">Copyright &copy; {{ date('Y') }} | All right reserved.</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('adminKit') }}/vendor/jquery/jquery.mask.min.js"></script>
    <script src="{{ asset('adminKit') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('adminKit') }}/vendor/select2/select2.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('adminKit') }}/js/select2.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('adminKit') }}/js/app.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                scrollX:true,
            });
        });
        $(document).ready(function(){
        
            $('.kode').mask('0.0.0.0.0.000');
            $('.rupiah').mask('000000000000000', {reverse:true});
            $('.hp').mask('0000-0000-0000');
        });
    </script>
    @stack('js')
</body>

</html>