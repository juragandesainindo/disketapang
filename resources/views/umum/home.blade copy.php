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
                                    <h1 class="mt-1 mb-3">{{ $pegawai }}</h1>
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
                                    <h1 class="mt-1 mb-3">{{ $sop }}</h1>
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
                                    <h1 class="mt-1 mb-3">{{ $peta }}</h1>
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
                                    <h1 class="mt-1 mb-3">{{ $kendaraan }}</h1>
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
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>Asset</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>KibA</td>
                                            <td>{{ number_format($kibA) }}</td>
                                        </tr>
                                        <tr>
                                            <td>KibB</td>
                                            <td>{{ number_format($kibB) }}</td>
                                        </tr>
                                        <tr>
                                            <td>KibC</td>
                                            <td>{{ number_format($kibC) }}</td>
                                        </tr>
                                        <tr>
                                            <td>KibD</td>
                                            <td>{{ number_format($kibD) }}</td>
                                        </tr>
                                        <tr>
                                            <td>KibE</td>
                                            <td>{{ number_format($kibE) }}</td>
                                        </tr>
                                        <tr>
                                            <td>KibF</td>
                                            <td>{{ number_format($kibF) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Atb</td>
                                            <td>{{ number_format($Atb) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- <span class="text-primary">(KibA => {{ number_format($kibA) }})</span>
                                &nbsp;
                                <span class="text-primary">(KibB => {{ number_format($kibB) }})</span>
                                &nbsp;
                                <span class="text-primary">(KibC => {{ number_format($kibC) }})</span>
                                &nbsp;
                                <span class="text-primary">(KibD => {{ number_format($kibD) }})</span>
                                &nbsp;
                                <span class="text-primary">(KibE => {{ number_format($kibE) }})</span>
                                &nbsp;
                                <span class="text-primary">(KibF => {{ number_format($kibF) }})</span>
                                &nbsp;
                                <span class="text-primary">(Atb => {{ number_format($Atb) }})</span> --}}
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
<script type="text/javascript">
    window.addEventListener("load", function(){
        setTimeout(
            function open(event) {
            document.querySelector("#popup").style.display = "block";
        }, 1000);
    });

    // button close
    document.querySelector("#close").addEventListener("click",function(){
        document.querySelector('#popup').style.display = "none";
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["KibA","KibB","KibC","KibD","KibE","KibF","Atb"],
					datasets: [{
						label: "(Rp)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							{!! json_encode($kibA, JSON_NUMERIC_CHECK) !!},
							{!! json_encode($kibB, JSON_NUMERIC_CHECK) !!},
							{!! json_encode($kibC, JSON_NUMERIC_CHECK) !!},
							{!! json_encode($kibD, JSON_NUMERIC_CHECK) !!},
							{!! json_encode($kibE, JSON_NUMERIC_CHECK) !!},
							{!! json_encode($kibF, JSON_NUMERIC_CHECK) !!},
							{!! json_encode($Atb, JSON_NUMERIC_CHECK) !!}
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000000000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
</script>
@endpush