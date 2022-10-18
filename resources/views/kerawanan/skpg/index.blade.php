@extends('layouts.master')
@section('title','SKPG Bulanan')
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
        <strong style="font-size: 18px;">Tambah SKPG Bulanan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('skpg-bulanan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong style="color:black;">Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong style="color:black;">Tanggal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="date" name="date" value="{{ old('date') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong style="color:black;">File Excel</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="excel" value="{{ old('excel') }}" required>
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
        <strong style="font-size: 18px;">Edit SKPG Bulanan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('skpg-bulanan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong style="color:black;">Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="keterangan" class="form-control" value="{{ $item->keterangan }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong style="color:black;">Tanggal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="date" value="{{ $item->date->isoFormat('DD-MM-Y') }}" required><br>
		        			<span class="text-danger">Format Tanggal: Hari/Bulan/Tahun</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong style="color:black;">File Excel</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="excel">
		        			<span class="text-danger">{{ $item->excel }}</span>
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
                            <div class="tab-content" style="overflow-x:auto;"
                            >
                                <table class="table" id="table1">
                                	<thead>
                                		<tr>
                                			<th>No</th>
                                			<th>Keterangan</th>
                                			<th>Tanggal</th>
                                			<th>File Excel</th>
                                			<th>Jumlah Peta</th>
                                            <th>Aksi</th>
                                		</tr>
                                	</thead>
                                	<tbody>
                                        @foreach($data as $key => $item)
                                		<tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->date->isoFormat('DD MMMM Y') }}</td>
                                            <td>
                                                <a href="{{ asset('kerawanan/skpg/'.$item->excel) }}">
                                                @if(File::exists('/kerawanan/skpg/{{ $item->excel }}'))
                                                @else
                                                <img src="{{ asset('/assets/excel.jpg') }}" width="50px">
                                                @endif
                                                </a>
                                            </td>
                                            <td>{{ $item->skpgpeta->count() }}</td>
                                            <td>
                                                <form action="{{ route('skpg-bulanan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                                                    <a href="{{ route('skpg-bulanan.show',$item->id) }}" class="btn btn-info btn-sm" title="Lihat"><i class="ti-eye"></i></a>
                                                    @if(Auth::user()->role_name=='Kadis Ketapang')
                                                    @else
                                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ini')"><i class="ti-trash"></i></button>
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
</div>

@stop