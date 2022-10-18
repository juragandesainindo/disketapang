@extends('layouts.master')
@section('title','Laporan Keuangan')
@section('content')

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Laporan Keuangan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('laporan-keuangan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Title</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="title" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>File</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" class="form-control" required>
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
	@foreach($lk as $data)
		<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		    	<div class="modal-content">
		        	<div class="modal-header bg-primary">
				        <strong style="font-size: 18px;">Edit Laporan Keuangan</strong>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				            <span aria-hidden="true">&times;</span>
				        </button>
		        	</div>
			    	<form action="{{ route('laporan-keuangan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
				      	@csrf
				      	@method('PUT')
					      <div class="modal-body">
						        <div class="form-group">
						        	<div class="row">
						        		<div class="col-lg-3">
						        			<strong>Title</strong>
						        		</div>
						        		<div class="col-lg-9">
						        			<input type="text" name="title" class="form-control" value="{{ $data->title }}" required>
						        		</div>
						        	</div>
						        </div>
						        <div class="form-group">
						        	<div class="row">
						        		<div class="col-lg-3">
						        			<strong>File</strong>
						        		</div>
						        		<div class="col-lg-9">
						        			<input type="file" name="file" class="form-control">
						        			<a href="{{ asset('keuangan/laporan-keuangan/'.$data->file) }}" class="text-danger" target="_blank">{{ $data->file }}</a>
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
	.my-active span{
		background-color: #5cb85c !important;
		color: white !important;
		border-color: #5cb85c !important;
	}
</style>

<div class="main">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        @else
                    	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
                    	@endif
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="col-lg-12">
	            <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
	              {{ session('success') }}
	            </div>
            </div>
	        @endif
	        
	        <div class="col-lg-12 m-t-35">
                @foreach($lk as $key => $d)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="{{ asset('keuangan/laporan-keuangan/'.$d->file) }}" target="_blank">
                            @if($d->file=='.jpg')
                            <img src="{{ asset('keuangan/laporan-keuangan/'.$d->file) }}" alt="Lights" style="width:100%">
                            @else
                            <embed type="application/pdf" src="{{ asset('keuangan/laporan-keuangan/'.$d->file) }}" class="img-rounded img-responsive" alt="Cinque Terre"></embed type="application/pdf">
                            @endif
                            <div class="caption">
                                <p>
                                    <h4><span class="text-info">{{ $d->title }}</span></h4>
                                    @if(Auth::user()->role_name=='Kadis Ketapang')
                                    @else
                                	<form action="{{ route('laporan-keuangan.destroy',$d->id) }}" method="POST" enctype="multipart/form-data">
                                    	<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{$d->id}}" title="Edit">Edit</a>
                                    	@csrf
			            				@method('DELETE')
			            				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data {{ $d->title }} ini ')" title="Delete">Hapus</button>
                                    </form>
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
		</div>
		<br>
		{{ $lk->links('vendor.pagination.custom') }}
	</div>
</div>

@stop