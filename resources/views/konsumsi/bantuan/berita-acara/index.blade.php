@extends('layouts.master')
@section('title','Berita Acara')
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
        <strong style="font-size: 18px;">Tambah Berita Acara</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kwt-berita-acara.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama KWT</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="kwt_kelompok_id" class="form-control" required>
		        			    <option disable selected>Pilih salah satu</option>
		        			    @foreach($verifikasi as $item)
		        			    <option value="{{ $item->kwtKelompok->id }}">{{ $item->kwtKelompok->nama_kwt }}</option>
		        			    @endforeach
		        			</select>
		        		</div>
		        	</div>
		        </div>
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
		        			<input type="date" name="tanggal" value="{{ old('tanggal') }}" required>
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
        <strong style="font-size: 18px;">Edit Berita Acara</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kwt-berita-acara.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama KWT</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="kwt_kelompok_id" class="form-control" required>
		        			    <option value="{{ $item->kwtKelompok->id }}">{{ $item->kwtKelompok->nama_kwt }}</option>
		        			    @foreach($verifikasi as $kelompok)
		        			    <option value="{{ $kelompok->kwtKelompok->id }}">{{ $kelompok->kwtKelompok->nama_kwt }}</option>
		        			    @endforeach
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Pendahuluan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="pendahuluan" class="form-control" required>{{ $item->pendahuluan }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kesimpulan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="kesimpulan" class="form-control" required>{{ $item->kesimpulan }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tanggal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="tanggal" value="{{ $item->tanggal->isoFormat('DD-MM-Y') }}" required><br>
		        			<span class="text-danger">*Format tanggal (Hari-Bulan-Tahun)</span>
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
		        <div class="card alert" style="overflow-x:auto;">
		            <div class="card-body">
		                <div class="tab-content">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Nama KWT</th>
		                        		<th>Pendahuluan</th>
		                        		<th>Kesimpulan</th>
		                        		<th>Tanggal</th>
		                        		<th>Bantuan</th>
		                                <th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($data as $key => $item)
	                        		<tr>
	                        		    <td>{{ ++$key }}</td>
	                        		    <td>{{ $item->kwtKelompok->nama_kwt }}</td>
	                        		    <td>{{ Str::limit($item->pendahuluan, 20) }}</td>
	                        		    <td>{{ Str::limit($item->kesimpulan, 20) }}</td>
	                        		    <td>{{ $item->tanggal->isoFormat('DD MMMM Y') }}</td>
	                        		    <td>
	                        		        {{ $item->kwtBeritaBantuan->count() }}<br>
	                        		        <a href="{{ route('kwt-berita-acara.show',$item->id) }}" class="badge badge-info">Lihat Disini</a>
                        		        </td>
	                        			<td>
	                        				<form action="{{ route('kwt-berita-acara.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="{{ route('kwt-berita-acara.pdf',$item->id) }}" class="btn btn-success btn-sm" target="_blank"><i class="ti-file"></i></a>
	                        					@if(Auth::user()->role_name=='Kadis Ketapang')
	                        					@else
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus data ini')"><i class="ti-trash"></i></button>
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