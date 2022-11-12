@extends('layouts.adminKit')
@section('title','Perawatan Asset Kib B')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="{{ route('perawatan-asset-kib-b.create') }}" class="btn btn-primary">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Create
                </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-lg-4">
                <form action="{{ route('perawatan-asset-kib-b.index') }}" method="GET">
                    <div class="form-group input-group">
                        <select name="search" class="form-control js-example-basic-single" required>
                            <option value="">Cari pemakai</option>
                            @foreach ($pegawai as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-primary border-0 text-white px-3">
                            Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table id="example" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Pemakai</th>
                                <th>Jenis</th>
                                <th>Type/Merk</th>
                                <th>Tgl</th>
                                <th>Uraian</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                <th>Img</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kibs as $item)
                            <tr>
                                <td>{{ $kodeBrg }}</td>
                                <td>{{ $item->assetUmumPegawai->pegawai->nama }}</td>
                                <td>{{ $item->assetUmumPegawai->jenis_barang }}</td>
                                <td>{{ $item->assetUmumPegawai->merk_type }}</td>
                                <td>{{ $item->tgl }}</td>
                                <td>{{ $item->uraian }}</td>
                                <td>{{ number_format($item->nilai) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->foto === NULL)
                                    <span class="text-secondary">Null</span>
                                    @else
                                    <a href="{{ asset('umum/asset/perawatan/kib-b/'.$item->foto) }}" target="_blank">
                                        <img src="{{ asset('umum/asset/perawatan/kib-b/'.$item->foto) }}" width="36"
                                            height="36" class="rounded-circle me-2" alt="Vanessa Tucker">
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm mb-1" title="Expot PDF" target="_blank"
                                        href="{{ route('perawatan-asset-kib-b.show',$item->id) }}">
                                        <i data-feather="download-cloud"></i> Export&nbsp;PDF
                                    </a>
                                    <a class="btn btn-warning btn-sm mb-1"
                                        href="{{ route('perawatan-asset-kib-b.edit',$item->id) }}">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $item->id }}">
                                        <i data-feather="trash"></i> Delete
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

@foreach ($kibs as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('perawatan-asset-kib-b.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        Pemakai : <strong>{{ $item->assetUmumPegawai->pegawai->nama }}</strong> <br>
                        Jenis : <strong>{{ $item->assetUmumPegawai->jenis_barang }}</strong> <br>
                        Merk/Type : <strong>{{ $item->assetUmumPegawai->merk_type }}</strong> <br>
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