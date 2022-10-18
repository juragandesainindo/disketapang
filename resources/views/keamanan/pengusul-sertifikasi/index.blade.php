@extends('layouts.master')
@section('title','KELOMPOK TANI YANG SUDAH MEMILIKI SERTIFIKASI PRIMA 3')
@section('content')

<!-- Modal add sop -->
<div class="modal fade" id="addSop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">TAMBAH KELOMPOK TANI YANG SUDAH MEMILIKI SERTIFIKASI PRIMA 3</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('pengusul-sertifikasi.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kelompok Tani</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="dkt_kelompok_id" class="form-control" required>
		        			    <option disable selected>Pilih salah satu</option>
		        			    @foreach($dkt as $item)
		        			    <option value="{{ $item->id }}">{{ $item->nama_dkt }}</option>
		        			    @endforeach
		        			</select>
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
@switch($edit)
@case(1)
@foreach($data as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">EDIT KELOMPOK TANI YANG SUDAH MEMILIKI SERTIFIKASI PRIMA 3</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('pengusul-sertifikasi.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kelompok Tani</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="dkt_kelompok_id" class="form-control" required>
		        			    <option value="{{ $item->dktKelompok->id }}">{{ $item->dktKelompok->nama_dkt }}</option>
		        			    @foreach($dkt as $item)
		        			    <option value="{{ $item->id }}">{{ $item->nama_dkt }}</option>
		        			    @endforeach
		        			</select>
		        		</div>
		        	</div>
		        </div>
	      </div>
	      <div class="modal-footer">
	      		<button type="submit" class="btn btn-primary">Edit Data</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@break
@endswitch
<!-- Modal edit -->

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>

<div class="main">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        <label></label>
                        @else
                    	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#addSop">Tambah</a>
                    	@endif
                        <h1 class="text-primary">@yield('title')</h1>
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
                <div class="card alert">
                    <div class="card-body">
                        <div class="tab-content" style="overflow-x: auto;">
                            <table class="table table-hover" id="table1">
                            	<thead>
                            		<tr>
                            			<th>No</th>
                            			<th>Nama Kelompok Tani</th>
                            			<th>Nama Ketua</th>
                            			<th>Alamat</th>
                            			<th>Kecamatan</th>
                            			@if(Auth::user()->role_name=='Kadis Ketapang')
                            			@else
                            			<th>Aksi</th>
                            			@endif
                            		</tr>
                            	</thead>
                            	<tbody>
                            	    @foreach($data as $key => $item)
                            		<tr>
                            			<td>{{ ++$key }}</td>
                            			<td>{{ $item->dktKelompok->nama_dkt }}</td>
                            			<td>{{ $item->dktKelompok->ketua }}</td>
                            			<td>{{ $item->dktKelompok->alamat }}</td>
                            			<td>{{ $item->dktKelompok->dktKecamatan->kecamatan }}</td>
                            			@if(Auth::user()->role_name=='Kadis Ketapang')
                            			@else
                            			<td>
                            			    <form action="{{ route('pengusul-sertifikasi.destroy',$item->id) }}" method="POST">
                            			        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
                            			        @csrf
                            			        @method('DELETE')
                            			        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini')"><i class="ti-trash"></i></button>
                            			    </form>
                            			</td>
                            			@endif
                            		</tr>
                            		@endforeach
                            	</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        	
		</div>
		<br>
	</div>
</div>

@stop