@extends('layouts.master')
@section('title','Proposal Kamapan')
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
        <strong style="font-size: 18px;">Tambah Proposal Kamapan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('proposal-kamapan.store') }}" method="POST" enctype="multipart/form-data">
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
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>File Proposal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" class="form-control" value="{{ old('file') }}" required>
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
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Proposal Kamapan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('proposal-kamapan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
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
		        			    <option value="{{ $item->dkt_kelompok_id }}">{{ $item->dktKelompok->nama_dkt }}</option>
		        			    @foreach($dkt as $d)
		        			    <option value="{{ $d->id }}">{{ $d->nama_dkt }}</option>
		        			    @endforeach
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="keterangan" class="form-control" value="{{ $item->keterangan }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>File Proposal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" class="form-control">
		        			<span>{{ $item->file }}</span>
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


<div class="main">
    <div class="container-fluid">
		<div class="row">

			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        <label></label>
                        @else
                    	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
                    	@endif
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
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Kelompok Tani</th>
		                        		<th>Keterangan</th>
		                        		<th>File Proposal</th>
		                        		<th>Dibuat</th>
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
	                        			<td>{{ $item->keterangan }}</td>
	                        			<td>
	                        				<a href="{{ asset('kerawanan/kt-kamapan/proposal/'.$item->file) }}" target="_blank">
	                        				<span class="text-info">{{ Str::limit($item->file, 30) }}</span>
	                        				</a>
	                        			</td>
	                        			<td>{{ $item->created_at->isoFormat('DD MMMM Y') }}</td>
	                        			@if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
	                        			<td>
	                        				<form action="{{ route('proposal-kamapan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus ')"><i class="ti-trash"></i></button>
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
	</div>
</div>

@stop