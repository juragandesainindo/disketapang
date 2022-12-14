@extends('layouts.adminKit')
@section('title','Daftar Pegawai')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>&nbsp; {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="{{ route('pegawai-duk-xlxs') }}" class="btn btn-outline-primary">
                    <i data-feather="download-cloud"></i>&nbsp;
                    Export DUK Excel
                </a>

                <a href="{{ route('pegawais.create') }}" class="btn btn-primary">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Create
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table id="example" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIP/Nama</th>
                                <th>Hp/Email</th>
                                <th>Alamat</th>
                                <th>Img</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $item->nama }}<br>
                                    <span class="text-sm">{{ $item->nip }}</span>
                                </td>
                                <td>
                                    {{ $item->no_hp }}<br>
                                    <span class="text-sm">{{ $item->email }}</span>
                                </td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    @if ($item->foto_diri === Null)
                                    <span class="text-secondary">Null</span>
                                    @else
                                    <a href="{{ asset('umum/pegawai/'.$item->foto_diri) }}" target="_blank">
                                        <img src="{{ asset('umum/pegawai/'.$item->foto_diri) }}" width="36" height="36"
                                            class="rounded-circle me-2" alt="Vanessa Tucker">
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm mb-1" href="{{ route('pegawais.show',$item->id) }}">
                                        <i data-feather="inbox"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm mb-1"
                                        href="{{ route('pegawais.edit',$item->id) }}">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $item->id }}">
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

@foreach ($pegawai as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawais.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        Nip : <strong>{{ $item->nip }}</strong> <br>
                        Nama : <strong>{{ $item->nama }}</strong>
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
@stop