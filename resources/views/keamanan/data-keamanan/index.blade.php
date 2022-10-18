@extends('layouts.master')
@section('title','DATA KEAMANAN PANGAN SEGAR')
@section('content')

<!-- Modal add file pangan segar -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Sampel Pangan Segar</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-keamanan-pangan-segar.store') }}" method="POST" enctype="multipart/form-data">
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

<!-- Modal add sampel pangan segar -->
<div class="modal fade" id="addSampel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Sampel Pangan Segar</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('sampel-pangan-segar') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tgl Pemeriksaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="date" name="tgl_pemeriksaan" value="{{ old('tgl_pemeriksaan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Lokasi</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Sayuran</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="sayuran" class="form-control" value="{{ old('sayuran') }}" required>
		        			<span class="text-danger">Jika tidak ada isian, isilah tanda -</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Buah</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="buah" class="form-control" value="{{ old('buah') }}" required>
		        			<span class="text-danger">Jika tidak ada isian, isilah tanda -</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Lainnya</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="lainnya" class="form-control" value="{{ old('lainnya') }}" required>
		        			<span class="text-danger">Jika tidak ada isian, isilah tanda -</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Asal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="asal" class="form-control" value="{{ old('asal') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Hasil</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="hasil" class="form-control" required>
		        			    <option value="Positif">Positif</option>
		        			    <option value="Negatif">Negatif</option>
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
        <strong style="font-size: 18px;">Edit Sampel Pangan Segar</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-keamanan-pangan-segar.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Title</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
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

<!--  Modal edit sampel pangan segar  -->
@switch($editSampel)
@case(1)
@foreach($sampel as $s)
<div class="modal fade" id="editSampel-{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Sampel Pangan Segar</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('sampel-pangan-segar-update',$s->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tgl Pemeriksaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="tgl_pemeriksaan" value="{{ $s->tgl_pemeriksaan->isoFormat('DD-MM-Y') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Lokasi</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="lokasi" class="form-control" value="{{ $s->lokasi }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="alamat" class="form-control" value="{{ $s->alamat }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Sayuran</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="sayuran" class="form-control" value="{{ $s->sayuran }}" required>
		        			<span class="text-danger">Jika tidak ada isian, isilah tanda -</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Buah</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="buah" class="form-control" value="{{ $s->buah }}" required>
		        			<span class="text-danger">Jika tidak ada isian, isilah tanda -</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Lainnya</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="lainnya" class="form-control" value="{{ $s->lainnya }}" required>
		        			<span class="text-danger">Jika tidak ada isian, isilah tanda -</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Asal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="asal" class="form-control" value="{{ $s->asal }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Hasil</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="hasil" class="form-control" required>
		        			    <option value="{{ $s->hasil }}">{{ $s->hasil }}</option>
		        			    <option value="Positif">Positif</option>
		        			    <option value="Negatif">Negatif</option>
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
<!--  Modal edit sampel pangan segar  -->

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
                    	<label></label>
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
	        
	        <style>
	            .table thead tr th{color:black;font-weight:bold;font-size:14px;text-align:center;}
	            .table tbody tr td{color:black;font-size:15px;text-align:center;}
	        </style>
	        
	        <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body" style="overflow-x:auto;">
    					<div class="user-profile">
    						<div class="row">
    							<div class="col-lg-12">
    								<div class="custom-tab user-profile-tab">
    									<ul class="nav nav-tabs" role="tablist">
    										<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">DATA PEMERIKSAAN SAMPEL PANGAN SEGAR</a></li>
    										<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">File Dokumen</a></li>
    									</ul>
    									<div class="tab-content">
    										<div role="tabpanel" class="tab-pane active" id="1">
    										    @if(Auth::user()->role_name=='Kadis Ketapang')
    										    @else
										        <div class="row">
										            <div class="col-md-2">
										                <a href="#" class="btn btn-info m-b-3" data-toggle="modal" data-target="#addSampel"><i class="ti-plus-circle"></i> Tambah</a>
										            </div>
										            <div class="col-md-9">
										                <form action="{{ route('sampel-pangan-segar-excel') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <div class="row">
										                            <div class="col-md-3">
										                                <input type="date" placeholder="Search Dari Tahun" id="from" name="from" required class="form-control btn-sm">
										                            </div>
										                            <div class="col-md-3">
										                                <input type="date" placeholder="Search Sampai Tahun" id="to" name="to" required class="form-control btn-sm">
										                            </div>
										                            <div class="col-md-3">
										                                <span class="input-group-btn"><button class="btn btn-primary btn-sm" type="submit" name="exportExcel">Export Excel</button></span>
										                            </div>
										                        </div>
                                                            </div>
                                                        </form>
										            </div>
										        </div>
										        @endif
    										    
    										    <table class="table table-hover table-bordered" id="table1">
    										        <thead>
    										            <tr>
    										                <th rowspan="2">No</th>
    										                <th rowspan="2">Tgl Pemeriksaan</th>
    										                <th rowspan="2">Lokasi</th>
    										                <th rowspan="2">Alamat</th>
    										                <th colspan="3">Jenis</th>
    										                <th rowspan="2">Asal</th>
    										                <th rowspan="2">Hasil</th>
    										                @if(Auth::user()->role_name=='Kadis Ketapang')
    										                @else
    										                <th rowspan="2">Aksi</th>
    										                @endif
    										            </tr>
    										            <tr>
    										                <th>Sayuran</th>
    										                <th>Buah</th>
    										                <th>Lainnya</th>
    										            </tr>
    										        </thead>
    										        <tbody>
    										            @foreach($sampel as $key => $item)
    										            <tr>
    										                <td>{{ ++$key }}</td>
    										                <td>{{ $item->tgl_pemeriksaan->isoFormat('DD MMMM Y') }}</td>
    										                <td>{{ $item->lokasi }}</td>
    										                <td>{{ $item->alamat }}</td>
    										                <td>{{ $item->sayuran }}</td>
    										                <td>{{ $item->buah }}</td>
    										                <td>{{ $item->lainnya }}</td>
    										                <td>{{ $item->asal }}</td>
    										                <td>{{ $item->hasil }}</td>
    										                @if(Auth::user()->role_name=='Kadis Ketapang')
    										                @else
    										                <td>
    										                    <form action="{{ route('sampel-pangan-segar-destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                    		                        				<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSampel-{{ $item->id }}" title="Edit"><i class="ti-pencil"></i></a>
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
    										
    										
    										
    										<div role="tabpanel" class="tab-pane" id="2">
                          <div class="gallery">
                            <div class="row">
                            	<div class="col-md-12">
                            	    @if(Auth::user()->role_name=='Kadis Ketapang')
                            	    @else
                            		<a href="#" class="btn btn-primary m-b-30" data-toggle="modal" data-target="#add">Tambah</a>
                            		@endif
                            		<br>
                            		@foreach($data as $item)

                            		<div class="col-md-4">
								                    <div class="thumbnail">
								                        <a href="{{ asset('keamanan/data-keamanan-pangan/'.$item->file) }}" target="_blank">
								                            @if($item->file=='.jpg')
								                            <img src="{{ asset('keamanan/data-keamanan-pangan/'.$item->file) }}" alt="Lights" style="width:100%">
								                            @else
								                            <embed type="application/pdf" src="{{ asset('keamanan/data-keamanan-pangan/'.$item->file) }}" class="img-rounded img-responsive" alt="Cinque Terre"></embed type="application/pdf">
								                            @endif
								                            <div class="caption">
								                                <p>
								                                    <h4><span class="text-info">{{ $item->title }}</span></h4>
								                                    @if(Auth::user()->role_name=='Kadis Ketapang')
								                                    @else
								                                	<form action="{{ route('data-keamanan-pangan-segar.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
								                                    	<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit">Edit</a>
								                                    	@csrf
											            				@method('DELETE')
											            				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini ')" title="Delete">Hapus</button>
								                                    </form>
								                                    @endif
								                                </p>
								                            </div>
								                        </a>
								                    </div>
								                </div>


                                <!-- <div class="col-lg-4">
                                    <div class="card alert">
                                        <div class="card-header m-b-5" style="display: flex;justify-content: space-between;align-items: center;">
                                    		<h4>{{ $item->title }}</h4>
                                    		@if(Auth::user()->role_name=='Kadis Ketapang')
                                    		@else
                                    		<div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" style="text-align: center;">
                                                	<form action="{{ route('data-keamanan-pangan-segar.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                    	<a href="/keamanan/data-keamanan-pangan/{{ $item->file }}" target="_blank" class="btn btn-success btn-sm m-b-5">Show</a><br>
                                                    	<a href="#" class="btn btn-warning btn-sm m-b-5" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit">Edit</a><br>
                                                    	@csrf
                			            				@method('DELETE')
                			            				<button type="submit" class="btn btn-danger btn-sm m-b-5" onclick="return confirm('Apakah anda ingin menghapus data ini ')" title="Delete">Hapus</button>
                                                    </form>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                        
                                        <div class="card-body" style="margin-top: 20px;">
                                        	<a href="{{ asset('keamanan/data-keamanan-pangan/'.$item->file) }}" target="_blank">
                                            	<embed type="application/pdf" src="{{ asset('keamanan/data-keamanan-pangan/'.$item->file) }}" class="img-rounded img-responsive" alt="Cinque Terre"></embed type="application/pdf">
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div> -->
                                @endforeach
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
		<br>
	</div>
</div>

@stop