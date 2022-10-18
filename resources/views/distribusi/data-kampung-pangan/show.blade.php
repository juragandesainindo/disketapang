@extends('layouts.master')
@section('title','Show Data Kampung Pangan')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;height: 65vh;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table thead{background: #f7f7f7}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>

<div class="main">
    <div class="container-fluid">
		<div class="row">
		    
		    <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                    	<a href="{{ url('data-kampung-pangan') }}" class="btn btn-default">Kembali</a>
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
                    </div>
                </div>
            </div>
            
		    <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
						<div class="user-profile">
							<div class="row">
								<div class="col-lg-4">
									<div class="user-photo m-b-30">
									    <a href="/distribusi/data-kampung-pangan/{{ $data->file }}" target="_blank">
										    <img class="img-responsive" src="/distribusi/data-kampung-pangan/{{ $data->file }}" alt="" />
										</a>
										<div class="text-danger" style="margin-top:10px;text-align:center">{{ $data->file }}</div>
									</div>
									
								</div>
								<div class="col-lg-8">
									<div class="user-profile-name" style="color:black;"><b>{{ $data->nama }}</b></div>
									<div class="custom-tab user-profile-tab">
										<ul class="nav nav-tabs" role="tablist">
											<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">Detail Informasi Data Kampung Pangan</a></li>
										</ul>
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="1">
												<div class="contact-information">
												    <div class="row" style="color:black;font-size:16px;">
												        <div class="col-md-3" style="font-weight:bold;">
												            Alamat
												        </div>
												        <div class="col-md-8">
												            : {{ $data->alamat }}
												        </div>
												        <div class="col-md-3" style="font-weight:bold;">
												            Kecamatan
												        </div>
												        <div class="col-md-8">
												            : {{ $data->kecamatan }}
												        </div>
												        <div class="col-md-3" style="font-weight:bold;">
												            Tahun
												        </div>
												        <div class="col-md-8">
												            : {{ $data->tahun }}
												        </div>
												        <div class="col-md-3" style="font-weight:bold;">
												            Jumlah Anggota
												        </div>
												        <div class="col-md-8">
												            : {{ $data->jumlah_anggota }}
												        </div>
												        <div class="col-md-3" style="font-weight:bold;">
												            Jenis Pelatihan
												        </div>
												        <div class="col-md-8">
												            : {{ $data->jenis_pelatihan }}
												        </div>
												        <div class="col-md-3" style="font-weight:bold;">
												            Jenis Bantuan
												        </div>
												        <div class="col-md-8">
												            : {{ $data->jenis_bantuan }}
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
		</div>
	</div>
</div>

@stop