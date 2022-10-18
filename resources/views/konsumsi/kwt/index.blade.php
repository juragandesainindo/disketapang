@extends('layouts.master')
@section('title','Data Kelompok Wanita Tani')
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
        <strong style="font-size: 18px;">Tambah Kecamatan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelompok-wanita-tani.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kecamatan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') }}" required>
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
        <strong style="font-size: 18px;">Edit Kecamatan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelompok-wanita-tani.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kecamatan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="kecamatan" class="form-control" value="{{ $item->kecamatan }}" required>
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
                        <label class="m-t-10">
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                        	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add">Tambah</a>
                        	@endif
                        	<a href="{{ url('kwt-export') }}" class="btn btn-success btn-outline" target="_blank">Export Excel</a>
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
		    
		    <div class="col-lg-5">
		        <div class="card alert" style="overflow-y:auto;height:75vh;">
		            <table class="table" id="table1">
		                <tr>
		                    <th><b>Pilih Kelompok Wanita Tani</b></th>
		                </tr>
		                @foreach($kwt as $item)
		                <tr>
		                    <td style="text-align:left;">
		                        <a href="{{ route('kelompok-wanita-tani-kelurahan.show',$item->kwtKelurahan->id) }}" class="text-info" target="_blank">{{ $item->nama_kwt }}</a>
	                        </td>
		                </tr>
		                @endforeach
		            </table>
	            </div>
            </div>

		    <div class="col-lg-7">
		        <div class="card alert" style="overflow-y:auto;height:75vh;">
		            <div class="card-body">
		                <div class="tab-content">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Kecamatan</th>
		                        		<th>Jumlah Kelurahan</th>
		                                <th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($data as $key => $item)
	                        		<tr>
	                        			<td>{{ ++$key }}</td>
	                        			<td>{{ $item->kecamatan }}</td>
	                        			<td>{{ $item->kelurahan->count() }}</td>
	                        			<td>
	                        				<form action="{{ route('kelompok-wanita-tani.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="{{ route('kelompok-wanita-tani.show',$item->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
	                        					@if(Auth::user()->role_name=='Kadis Ketapang')
	                        					@else
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus ')"><i class="ti-trash"></i></button>
	                        				    @endif
	                        				</form>
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
</div>

@stop