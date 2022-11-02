@extends('layouts.adminKit')
@section('title','Data User')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="{{ route('data-user.create') }}" class="btn btn-primary">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add User
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table id="example" class="table table-striped" style="width:100%;">
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
                                    <a class="btn btn-info btn-sm mb-1" href="{{ route('data-user.edit',$user->id) }}">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $user->id }}">
                                        <i data-feather="trash"></i>
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
</main>

@foreach ($users as $user)
<div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('data-user.destroy',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        Nama : <strong>{{ $user->name }}</strong> <br>
                        Email : <strong>{{ $user->email }}</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection