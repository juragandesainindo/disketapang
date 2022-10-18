@extends('layouts.master')
@section('title','Data Prognosa')
@section('content')

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Data Prognosa</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-prognosa.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Title</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>File</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" value="{{ old('file') }}" class="form-control" required>
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
        <strong style="font-size: 18px;">Edit Data Prognosa</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-prognosa.update', $item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Title</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>File</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" value="{{ $item->file }}" class="form-control">
		        			<span class="text-danger">{{ $item->file }}</span>
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
	.table thead tr th{color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table tbody tr td{text-align: center;font-size: 15px;color: black;}
</style>

<div class="main">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        @else
	                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
	                    @endif	
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
                    </div>
                </div>
            </div>

		    <div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content" style="overflow-x:auto;">
				        	@if(session('success'))
		                        <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
		                          {{ session('success') }}
		                        </div> 
		                    @endif
	                        <table class="table table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Title</th>
		                        		<th>File</th>
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
		                        		<td>{{ $item->title }}</td>
		                        		<td>
		                        		    <a href="{{ asset('kerawanan/data-prognosa/'.$item->file) }}" target="_blank">
		                        		        <span class="badge badge-info">{{ Str::limit($item->file, 30) }}</span>
		                        		    </a>
		                        		</td>
		                        		@if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
		                        		<td>
		                        			<form action="{{ route('data-prognosa.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
		                        				<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil"></i></a>
		                        				@csrf
		                        				@method('DELETE')
		                        				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini ')" title="Delete"><i class="ti-trash"></i></button>
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