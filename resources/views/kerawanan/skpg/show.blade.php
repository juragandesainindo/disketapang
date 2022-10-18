@extends('layouts.master')
@section('title','Peta SKPG')
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
        <strong style="font-size: 18px;">Tambah Peta SKPG</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('skpg-peta.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	          <input type="hidden" name="skpg_id" value="{{ $data->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Pilih Indeks</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="keterangan" class="form-control" required>
		        			    <option disable selected>Pilih salah satu</option>
		        			    <option value="Indeks Ketersediaan">Indeks Ketersediaan</option>
		        			    <option value="Indeks Akses">Indeks Akses</option>
		        			    <option value="Indeks Pemanfaatan">Indeks Pemanfaatan</option>
		        			    <option value="Indeks Komposi">Indeks Komposi</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Image Indeks</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="peta" class="form-control" value="{{ old('peta') }}" required>
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
@foreach($data->skpgpeta as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Peta SKPG</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('skpg-peta.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Pilih Indeks</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="keterangan" class="form-control" required>
		        			    <option value="{{ $item->keterangan }}">{{ $item->keterangan }}</option>
		        			    <option value="Indeks Ketersediaan">Indeks Ketersediaan</option>
		        			    <option value="Indeks Akses">Indeks Akses</option>
		        			    <option value="Indeks Pemanfaatan">Indeks Pemanfaatan</option>
		        			    <option value="Indeks Komposi">Indeks Komposi</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Image Indeks</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="peta" class="form-control" value="{{ $item->peta }}">
		        			<img src="{{ asset('kerawanan/skpg/'.$item->peta) }}" width="100px" class="m-t-5">
		        			<span class="text-danger">{{ $item->peta }}</span>
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
                    	<label style="margin-top: 10px;">
                        	<a href="{{ route('skpg-bulanan.index') }}" class="btn btn-default btn-outline">Kembali</a>
                        	@if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                        	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
                        	@endif
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
                <div class="card alert">
                    <div class="card-header">
                        <h4 style="color:black;">Galeri Image Indeks SKPG Bulanan</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted m-b-15">Untuk penginputan image indeks dapat dilakukan sesuai dengan data image yang tersedia</p>
                        
                        
                        <div class="row">
                            @foreach($data->skpgpeta as $item)
                            @if($item->keterangan=='Indeks Ketersediaan')
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ asset('kerawanan/skpg/'.$item->peta) }}" target="_blank">
                                        <img src="{{ asset('kerawanan/skpg/'.$item->peta) }}" alt="Lights" style="height:200px">
                                        <div class="caption" style="display: flex;justify-content:space-between;align-items:center;">
                                            <p style="color:black;"><strong>{{ $item->keterangan }}</strong></p>
                                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                            <form action="{{ route('skpg-peta.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ini')"><i class="ti-trash"></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @if($item->keterangan=='Indeks Akses')
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ asset('kerawanan/skpg/'.$item->peta) }}" target="_blank">
                                        <img src="{{ asset('kerawanan/skpg/'.$item->peta) }}" alt="Lights" style="height:200px">
                                        <div class="caption" style="display: flex;justify-content:space-between;align-items:center;">
                                            <p style="color:black;"><strong>{{ $item->keterangan }}</strong></p>
                                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                            <form action="{{ route('skpg-peta.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ini')"><i class="ti-trash"></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @if($item->keterangan=='Indeks Pemanfaatan')
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ asset('kerawanan/skpg/'.$item->peta) }}" target="_blank">
                                        <img src="{{ asset('kerawanan/skpg/'.$item->peta) }}" alt="Lights" style="height:200px">
                                        <div class="caption" style="display: flex;justify-content:space-between;align-items:center;">
                                            <p style="color:black;"><strong>{{ $item->keterangan }}</strong></p>
                                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                            <form action="{{ route('skpg-peta.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ini')"><i class="ti-trash"></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @if($item->keterangan=='Indeks Komposi')
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ asset('kerawanan/skpg/'.$item->peta) }}" target="_blank">
                                        <img src="{{ asset('kerawanan/skpg/'.$item->peta) }}" alt="Lights" style="height:200px">
                                        <div class="caption" style="display: flex;justify-content:space-between;align-items:center;">
                                            <p style="color:black;"><strong>{{ $item->keterangan }}</strong></p>
                                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                            <form action="{{ route('skpg-peta.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ini')"><i class="ti-trash"></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@stop