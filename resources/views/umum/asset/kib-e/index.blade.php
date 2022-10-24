@extends('layouts.adminKit')
@section('title','KIB E ( Asset Tetap Lainnya )')

@section('content')
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('kib-e.index') }}" method="GET">
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

                <a href="{{ route('kib-e.create') }}" class="btn btn-primary">
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
                                <th>Barang</th>
                                <th>Nilai (Rp)</th>
                                <th>Tgl</th>
                                <th>Penggunaan</th>
                                <th>Keterangan</th>
                                <th>Img</th>
                                <th>Penanggung Jawab</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kibs as $kib)
                            <tr>
                                <td>{{ $kib->mappingAsset->kode_brg }}</td>
                                <td>{{ $kib->mappingAsset->nama_brg }}</td>
                                <td>{{ number_format($kib->nilai_brg) }}</td>
                                <td>{{ $kib->tgl_perolehan }}</td>
                                <td>{{ $kib->penggunaan }}</td>
                                <td>{{ $kib->keterangan }}</td>
                                <td>
                                    @if ($kib->foto === NULL)
                                    <span class="text-secondary">Null</span>
                                    @else
                                    <a href="{{ asset('umum/asset/kib-e/'.$kib->foto) }}" target="_blank">
                                        <img src="{{ asset('umum/asset/kib-e/'.$kib->foto) }}" width="36" height="36"
                                            class="rounded-circle me-2" alt="Vanessa Tucker">
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary">
                                        {{ $kib->penanggung_jawab }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('kib-e.edit',$kib->id) }}">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $kib->id }}">
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

@foreach ($kibs as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kib-e.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        Kode barang : <strong>{{ $item->mappingAsset->kode_brg }}</strong> <br>
                        Nama Barang : <strong>{{ $item->mappingAsset->nama_brg }}</strong> <br>
                        Keterangan : <strong>{{ $item->keterangan }}</strong> <br>
                        Penanggung Jawab : <strong>{{ $item->penanggung_jawab }}</strong> <br>
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