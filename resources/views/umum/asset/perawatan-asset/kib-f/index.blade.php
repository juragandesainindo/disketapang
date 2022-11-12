@extends('layouts.adminKit')
@section('title','Perawatan Asset Kib F')

@section('content')
<!-- Modal -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('perawatan-asset-kib-f.index') }}" method="GET">
                    <div class="input-group">
                        <select name="search" class="form-control form-select" required>
                            <option value="">Pilih Penanggung Jawab</option>
                            <option value="Kadis">Kadis</option>
                            <option value="Sekretariat">Sekretariat</option>
                            <option value="Ketersediaan & Kerawanan">Ketersediaan & Kerawanan</option>
                            <option value="Distribusi & Cadangan">Distribusi & Cadangan</option>
                            <option value="Keamanan & Konsumsi">Keamanan & Konsumsi</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Pilih</button>
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
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#search">
                    <i data-feather="search"></i>&nbsp;
                    search
                </button>

                <a href="{{ route('perawatan-asset-kib-f.create') }}" class="btn btn-primary">
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
                                <th>Kode</th>
                                <th>Barang&nbsp;/&nbsp;KDP</th>
                                <th>Tgl</th>
                                <th>Uraian</th>
                                <th>Nilai (Rp)</th>
                                <th>Keterangan</th>
                                <th>Img</th>
                                <th>Penanggung Jawab</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kibs as $item)
                            <tr>
                                <td>{{ $item->assetUmum->mappingAsset->kode_brg }}</td>
                                <td>{{ $item->assetUmum->mappingAsset->nama_brg }} <br>
                                    {{ $item->assetUmum->kdp }}
                                </td>
                                <td>{{ $item->tgl }}</td>
                                <td>{{ $item->uraian }}</td>
                                <td>{{ number_format($item->nilai) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->foto === NULL)
                                    <span class="text-secondary">Null</span>
                                    @else
                                    <a href="{{ asset('umum/asset/perawatan/kib-f/'.$item->foto) }}" target="_blank">
                                        <img src="{{ asset('umum/asset/perawatan/kib-f/'.$item->foto) }}" width="36"
                                            height="36" class="rounded-circle me-2" alt="Vanessa Tucker">
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary">
                                        {{ $item->assetUmum->penanggung_jawab }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm mb-1" title="Expot PDF" target="_blank"
                                        href="{{ route('perawatan-asset-kib-f.show',$item->id) }}">
                                        <i data-feather="download-cloud"></i> Export&nbsp;PDF
                                    </a>
                                    <a class="btn btn-warning btn-sm mb-1"
                                        href="{{ route('perawatan-asset-kib-f.edit',$item->id) }}">
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
            <form action="{{ route('perawatan-asset-kib-f.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        Kode barang : <strong>{{ $item->assetUmum->mappingAsset->kode_brg }}</strong> <br>
                        Nama Barang : <strong>{{ $item->assetUmum->mappingAsset->nama_brg }}</strong> <br>
                        KDP : <strong>{{ $item->assetUmum->kdp }}</strong> <br>
                        Tgl Dokumen : <strong>{{ $item->assetUmum->tgl_dokumen }}</strong> <br>
                        Keterangan : <strong>{{ $item->keterangan }}</strong> <br>
                        Penanggung Jawab : <strong>{{ $item->assetUmum->penanggung_jawab }}</strong> <br>
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