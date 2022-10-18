@extends('layouts.adminKit')
@section('title','Peta Jabatan')
@section('content')

@include('umum.peta-jabatan.modal')

<main class="content">
    <div class="container-fluid p-0">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Create
                </a>
            </div>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>&nbsp; {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            @forelse ($peta as $key => $item)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <embed type="application/pdf" src="{{ asset('umum/peta-jabatan/' . $item->file) }}"
                        class="img-rounded img-responsive" alt="Cinque Terre"></embed>
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{$item->title}}</h5>
                        <a href="{{ asset('umum/peta-jabatan/'.$item->file) }}" target="_blank"
                            class="btn btn-sm btn-info"><i data-feather="image"></i> View</a>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit-{{ $item->id }}"><i data-feather="edit"></i> Edit</a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-{{ $item->id }}"><i data-feather="trash"></i> Delete</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3 text-center text-danger">
                    Data Peta Jabatan Null
                </div>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $peta->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>
</main>

@endsection