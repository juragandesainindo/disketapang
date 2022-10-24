@extends('layouts.adminKit')
@section('title','Dashboard')

@section('content')
<style>
    #popup {
        background: blue;
        width: 450px;
        height: 30px 40px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
        z-index: 1000;
        font-family: "Poppins", sans-serif;
        display: none;
    }

    #popup button {
        display: block;
        margin: 0 0 20px auto;
        background: transparent;
        font-size: 30px;
        color: #c5c5c5;
        border: none;
        outline: none;
        cursor: pointer;
    }

    #popup p {
        font-size: 14px;
        text-align: justify;
    }
</style>

{{-- <div id="popup">
    <h1>This is pop up</h1>
    <button id="close">&times;</button>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed repellendus impedit illum debitis eaque, recusandae
        officiis totam aliquam aut autem beatae numquam explicabo, hic molestiae eos quas fuga, repellat esse.
        Mollitia odio aliquid similique necessitatibus ullam ea molestiae modi suscipit officia harum deserunt, quos
        voluptatum optio veniam numquam nisi placeat quia nihil voluptas inventore, explicabo sit at. Debitis,
        necessitatibus alias?</p>
    <a href="#">link</a>
</div> --}}

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Dashboard <strong>Asset</strong></h1>
        <div class="row">
            <div class="col-xl-12 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Pegawai</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3"></h1>
                                    <div class="mb-0">
                                        <a href="{{ url('pegawais') }}">
                                            <strong>Lihat Pegawai</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SOP</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="clipboard"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3"></h1>
                                    <div class="mb-0">
                                        <a href="{{ url('sop') }}">
                                            <strong>Lihat SOP</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Peta Jabatan</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="clipboard"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3"></h1>
                                    <div class="mb-0">
                                        <a href="{{ url('peta-jabatan') }}">
                                            <strong>Lihat Peta Jabatan</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Kendaraan</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3"></h1>
                                    <div class="mb-0">
                                        <a href="{{ url('kendaraans') }}">
                                            <strong>Lihat Kendaraan</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Nilai Asset ({{ date('Y') }})</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="chart chart-sm">
                                    <canvas id="chartjs-dashboard-line"></canvas>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
@endpush