@extends('layouts.master')
@section('title','Management Akses Login')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;height: 65vh;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table thead{background: #f7f7f7}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:black;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah User Baru</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('add-new-user.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body" style="overflow-y: auto;">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Lengkap</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Inputkan Nama Lengkap" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Email</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Inputkan Email" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Telepon</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" placeholder="Inputkan Telepon" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Akses Login</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select class="form-control" name="role_name" id="role_name" required>
                                <option selected disabled>Pilih Akses Login</option>
                                <optgroup label="Pembina">
                                    <option value="Kadis Ketapang">Kadis Ketapang</option>
                                </optgroup>
                                <optgroup label="Administrator">
                                    <option value="Super Admin">Super Admin</option>
                                </optgroup>
                                <optgroup label="Koordinator">
                                    <option value="Kabid Ketersediaan dan Kerawanan Pangan">Kabid Ketersediaan dan Kerawanan Pangan</option>
                                    <option value="Kabid Distribusi dan Cadangan Pangan">Kabid Distribusi dan Cadangan Pangan</option>
                                    <option value="Kabid Konsumsi dan Keamanan Pangan">Kabid Konsumsi dan Keamanan Pangan</option>
                                </optgroup>
                                <optgroup label="Sekretariat">
                                    <option value="Kasub Bagian Umum">Kasub Bagian Umum</option>
                                    <option value="Kasub Bagian Keuangan">Kasub Bagian Keuangan</option>
                                </optgroup>
                                <optgroup label="Bidang Ketersediaan dan Kerawanan Pangan">
                                    <option value="Kasi Ketersediaan Pangan">Kasi Ketersediaan Pangan</option>
                                    <option value="Kasi Sumber Daya Pangan">Kasi Sumber Daya Pangan</option>
                                    <option value="Kasi Kerawanan Pangan">Kasi Kerawanan Pangan</option>
                                </optgroup>
                                <optgroup label="Bidang Distribusi dan Cadangan Pangan">
                                    <option value="Kasi Distribusi Pangan">Kasi Distribusi Pangan</option>
                                    <option value="Kasi Harga Pangan">Kasi Harga Pangan</option>
                                    <option value="Kasi Cadangan Pangan">Kasi Cadangan Pangan</option>
                                </optgroup>
                                <optgroup label="Bidang Konsumsi dan Keamanan Pangan">
                                    <option value="Kasi Keamanan Pangan">Kasi Keamanan Pangan</option>
                                    <option value="Kasi Penganekaragaman Konsumsi Pangan">Kasi Penganekaragaman Konsumsi Pangan</option>
                                    <option value="Kasi Konsumsi Pangan">Kasi Konsumsi Pangan</option>
                                </optgroup>
                            </select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Password</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="password" class="form-control form-password" name="password" placeholder="Choose Password" required>
                            <input type="checkbox" class="form-checkbox" id="password"> Show password
                            <span class="text-danger">Min. 8 karakter</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Konfirmasi Password</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="password" class="form-control" name="password_confirmation" placeholder="Choose Confirm Password" required>
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
@foreach($users as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:black;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit User</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('add-new-user.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Lengkap</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="name" class="form-control" value="{{ $item->name }}" placeholder="Inputkan Nama Lengkap" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Email</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="email" name="email" class="form-control" value="{{ $item->email }}" placeholder="Inputkan Email" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Telepon</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="telepon" class="form-control" value="{{ $item->telepon }}" placeholder="Inputkan Telepon" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Akses Login</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select class="form-control" name="role_name" id="role_name" required>
                                <option value="{{ $item->role_name }}">{{ $item->role_name }}</option>
                                <optgroup label="Pembina">
                                    <option value="Kadis Ketapang">Kadis Ketapang</option>
                                </optgroup>
                                <optgroup label="Administrator">
                                    <option value="Super Admin">Super Admin</option>
                                </optgroup>
                                <optgroup label="Koordinator">
                                    <option value="Kabid Ketersediaan dan Kerawanan Pangan">Kabid Ketersediaan dan Kerawanan Pangan</option>
                                    <option value="Kabid Distribusi dan Cadangan Pangan">Kabid Distribusi dan Cadangan Pangan</option>
                                    <option value="Kabid Konsumsi dan Keamanan Pangan">Kabid Konsumsi dan Keamanan Pangan</option>
                                </optgroup>
                                <optgroup label="Sekretariat">
                                    <option value="Kasub Bagian Umum">Kasub Bagian Umum</option>
                                    <option value="Kasub Bagian Keuangan">Kasub Bagian Keuangan</option>
                                </optgroup>
                                <optgroup label="Bidang Ketersediaan dan Kerawanan Pangan">
                                    <option value="Kasi Ketersediaan Pangan">Kasi Ketersediaan Pangan</option>
                                    <option value="Kasi Sumber Daya Pangan">Kasi Sumber Daya Pangan</option>
                                    <option value="Kasi Kerawanan Pangan">Kasi Kerawanan Pangan</option>
                                </optgroup>
                                <optgroup label="Bidang Distribusi dan Cadangan Pangan">
                                    <option value="Kasi Distribusi Pangan">Kasi Distribusi Pangan</option>
                                    <option value="Kasi Harga Pangan">Kasi Harga Pangan</option>
                                    <option value="Kasi Cadangan Pangan">Kasi Cadangan Pangan</option>
                                </optgroup>
                                <optgroup label="Bidang Konsumsi dan Keamanan Pangan">
                                    <option value="Kasi Keamanan Pangan">Kasi Keamanan Pangan</option>
                                    <option value="Kasi Penganekaragaman Konsumsi Pangan">Kasi Penganekaragaman Konsumsi Pangan</option>
                                    <option value="Kasi Konsumsi Pangan">Kasi Konsumsi Pangan</option>
                                </optgroup>
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

<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
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
                        <div class="tab-content" style="overflow-x:auto;">
                            <table class="table table-striped custom-table datatable" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Akses Login</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key=>$user )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td width="20%" style="text-align:left;">{{ $user->name }}</td>
                                        <td width="25%" style="text-align:left;">{{ $user->email }}</td>
                                        <td>{{ $user->telepon }}</td>
                                        <td>
                                            @if ($user->role_name=='Kadis Ketapang')
                                                <span class="badge badge-danger">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Super Admin')
                                                <span class="badge bg-danger">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kabid Ketersediaan dan Kerawanan Pangan')
                                                <span class="badge badge-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kabid Distribusi dan Cadangan Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kabid Konsumsi dan Keamanan Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasub Bagian Umum')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasub Bagian Keuangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Ketersediaan Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Sumber Daya Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Kerawanan Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Distribusi Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                
                                                @elseif ($user->role_name=='Kasi Harga Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Cadangan Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Keamanan Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Penganekaragaman Konsumsi Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                                @elseif ($user->role_name=='Kasi Konsumsi Pangan')
                                                <span class="badge bg-info">{{ $user->role_name }}</span>
                                            @endif
                                        </td>
                                        <td width="5%">
                                            <form action="{{ route('add-new-user.destroy',$user->id) }}" method="POST">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $user->id }}"><i class="ti-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $user->name }}')"><i class="ti-trash"></i></button>
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