@extends('layouts.adminKit')
@section('title','Evaluasi Renstra')
@section('content')

<!-- Search -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('evaluasi-renstra.index') }}" method="GET">
                    @csrf
                    @php
                    $year = date('Y');
                    $min = $year - 60;
                    $max = $year;
                    @endphp
                    <div class="input-group">
                        <select name="search" class="form-control" width="100%">
                            <option value="">Pilih Tahun</option>
                            @for ($i = $max; $i >= $min; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit" class="btn btn-primary">Pilih</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- export -->
<div class="modal fade" id="export" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('evaluasi-renstra-export') }}" method="GET">
                    @csrf
                    @php
                    $year = date('Y');
                    $min = $year - 60;
                    $max = $year;
                    @endphp
                    <div class="input-group">
                        <select name="form" id="form" class="form-control" width="100%">
                            <option value="">Pilih Tahun</option>
                            @for ($i = $max; $i >= $min; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit" class="btn btn-primary" name="export">Pilih</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="#" data-bs-toggle="modal" data-bs-target="#search" class="btn btn-outline-info">
                    <i data-feather="search"></i>&nbsp;
                    Search
                </a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#export" class="btn btn-outline-info">
                    <i data-feather="download-cloud"></i>&nbsp;
                    Excel
                </a>
                <a href="{{ route('evaluasi-renstra.create') }}" class="btn btn-primary">
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
                                <th>No</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th>Rasio</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($renstra as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->indikator }}</td>
                                <td>{{ $item->target }}</td>
                                <td>{{ $item->realisasi }}</td>
                                <td>{{ $item->rasio }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>
                                    <a href="{{ route('evaluasi-renstra.edit',$item->id) }}"
                                        class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $item->id }}"><i data-feather="trash"></i></a>
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

@foreach ($renstra as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('evaluasi-renstra.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini ? <br>
                    Indikator : <strong>{{ $item->indikator }}</strong> <br>
                    Tahun : <strong>{{ $item->tahun }}</strong> <br>
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