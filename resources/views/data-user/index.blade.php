@extends('layouts.master')
@section('title','Data User Akses Login')

@section('content')
<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <a href="{{ route('data-user.create') }}" class="btn btn-primary">
                            <i data-feather="folder-plus"></i>&nbsp;
                            Add User
                        </a>
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
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>HP</th>
                                        <th>Status</th>
                                        <th>Akses Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->telepon }}</td>
                                        <td>
                                            @if ($user->status === 0)
                                            <span class="badge bg-danger">Deactive</span>
                                            @else
                                            <span class="badge bg-primary">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->role_name }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm mb-1"
                                                href="{{ route('data-user.edit',$user->id) }}">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal"
                                                data-target="#delete-{{ $user->id }}">
                                                <i class="ti-trash"></i>
                                            </button>
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

@foreach ($users as $user)
<div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color:black;">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Hapus Data</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('data-user.destroy',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body" style="overflow-y: auto;">
                    Apakah yakin ingin menghapus data ini? <br>
                    Nama : <strong>{{ $user->name }}</strong> <br>
                    Email : <strong>{{ $user->email }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection