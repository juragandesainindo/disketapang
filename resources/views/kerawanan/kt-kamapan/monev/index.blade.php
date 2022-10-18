@extends('layouts.master')
@section('title','Monitoring Evaluasi')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>


<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Data</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('berita-acara-store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Pendahuluan</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<textarea name="pendahuluan" class="form-control" required>{{ old('pendahuluan') }}</textarea>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Kesimpulan</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<textarea name="kesimpulan" class="form-control" required>{{ old('kesimpulan') }}</textarea>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Tanggal</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input type="date" name="tanggal" required value="{{ old('tanggal') }}">
    	        		</div>
    	        	</div>
    	        </div>
	      </div>
	      <div class="modal-footer">
	      		<button type="submit" class="btn btn-primary">Simpan Data</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal add -->

<!-- Modal edit -->
<!-- Modal edit -->


<div class="main">
    <div class="container-fluid">
		<div class="row">

			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <label style="margin-top: 10px;">
                        </label>
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
                    </div>
                </div>
            </div>

		    <div class="col-lg-12">
		    	@if(session('success'))
                    <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
                      {{ session('success') }}
                    </div> 
                @endif
		    </div>

		    <div class="col-lg-12">    
                <div class="panel panel-default m-t-15">
                    <div class="panel-body">
                        <table class="table table-striped table-hover" id="table1">
                        	<thead>
	                        	<tr>
	                        		<th>No</th>
	                                <th>Kelompok Tani</th>
	                                <th>Bantuan</th>
	                                <th>Aksi</th>
	                        	</tr>
                        	</thead>
                        	<tbody>
                        		@foreach($data as $key => $item)
                        		<tr>
                        			<td>{{ ++$key }}</td>
                        			<td>{{ $item->dktKelompok->nama_dkt }}</td>
                        			<td>
                        			    <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
											<ul class="card-option-dropdown dropdown-menu">
												<li>
												    <table class="table table-hover">
												        <tr>
												            <th>No</th>
												            <th>Jenis Bantuan</th>
												            <th>Jumlah</th>
												            <th>Satuan</th>
												            <th>Keterangan</th>
												        </tr>
											            @foreach($item->beritaAcaraShow as $key => $bantuan)
												        <tr>
												            <td>{{ ++$key }}</td>
												            <td>{{ $bantuan->jenis_barang }}</td>
												            <td>{{ $bantuan->jumlah }}</td>
												            <td>{{ $bantuan->satuan }}</td>
												            <td>{{ $bantuan->keterangan }}</td>
												        </tr>
												        @endforeach
												    </table>
											    </li>
											</ul>
										</li>
                        			</td>
                        			<td>
                    					<a href="{{ route('monev-kamapan.excel',$item->id) }}" class="btn btn-success btn-sm" target="_blank">Export Excel</a>
                        			</td>
                        		</tr>
                        		@endforeach
                        	</tbody>
                        </table>
                    </div>
                </div>  
		    </div>
		</div>
	</div>
</div>

@stop