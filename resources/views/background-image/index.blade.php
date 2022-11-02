@extends('layouts.adminKit')
@section('title','Background Image Login')

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
            <div class="col-12 col-lg-7">
                <div class="card bg-primary text-center" style="width:100%;height:700px;">
                    <div class="card-body">
                        <p class="card-text text-white">Ukuran background 500 x 625 pixcel</p>
                    </div>
                    <img src="{{ asset('assets/login-flyer.jpg') }}"
                        style="width: 500px;height:625px;margin:0 auto 10px;">

                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if ($user->foto_diri === Null)
                                    @else
                                    <a href="{{ asset('umum/pegawai/'.$user->foto_diri) }}" target="_blank">
                                        <img src="{{ asset('umum/pegawai/'.$user->foto_diri) }}" width="36" height="36"
                                            class="rounded-circle me-2" alt="Vanessa Tucker">
                                    </a>
                                    @endif
                                </td>
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