@extends('layouts.master')

@section('content')


<style type="text/css">
	.contact-title{width: 200px;}
	table .thead td{color: black;font-weight: bold;font-size: 16px; text-align: center;}
	table .tbody td{color: black;}
	.table tr th{color: black;font-weight: bold;width: 200px;}
	.table tr td{color: black;font-weight: bold;}
</style>
<div class="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card alert">
                <div class="card-body">
					<div class="user-profile">
						<div class="row">
							<div class="col-lg-4">
								<div class="user-photo m-b-30">
									<strong style="color: black;">Gambar Gudang</strong>
									<a href="{{ asset('distribusi/unit-distributor/'.$unit->gambar) }}" target="_blank"><img class="img-responsive" src="{{ asset('distribusi/unit-distributor/'.$unit->gambar) }}" alt="" /></a>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="user-profile-name" style="color: black;font-weight: bold;display: flex;justify-content: space-between;">{{ $unit->bentuk_usaha }} {{ $unit->nama_perusahaan }} <a href="{{ route('unit-distributor.index') }}" class="btn btn-danger btn-outline">Kembali</a></div>
								<div class="custom-tab user-profile-tab">
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">Detail Gudang</a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="1">
											<div class="contact-information" style="color: black;">
												<table class="table table-hover">
													<tr>
														<th>Nama</th>
														<td>{{ $unit->nama_perusahaan }}</td>
													</tr>
													<tr>
														<th>Telepon</th>
														<td>{{ $unit->telepon }}</td>
													</tr>
													<tr>
														<th>Komoditi</th>
														<td>{{ $unit->komoditi }}</td>
													</tr>
													<tr>
														<th>Alamat</th>
														<td>{{ $unit->alamat }}</td>
													</tr>
													<tr>
														<th>Maps</th>
														<td><a href="{{ $unit->link }}" target="_blank" class="text-info">{{ $unit->link }}</a></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
			

@stop