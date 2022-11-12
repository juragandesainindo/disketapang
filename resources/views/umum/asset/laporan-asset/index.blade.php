@extends('layouts.adminKit')
@section('title','Laporan Asset')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3">@yield('title')</h1>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="alert alert-primary" role="alert">
                    Total Nilai Satuan <br>
                    <strong>Rp. {{ number_format($totalBrg) }}</strong>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="alert alert-success" role="alert">
                    Total Nilai Perolehan (Total) <br>
                    <strong>Rp. {{ number_format($totalPerolehan) }}</strong>
                </div>
            </div>
        </div>

        <div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('laporan-asset.index') }}" method="GET">
                            <div class="input-group">
                                <select name="semester" class="form-control form-select" required>
                                    <option value="">Pilih Penanggung Jawab</option>
                                    <option value="{{ $assets }}">Semester2</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-4 col-md-6 btn-group">
                <form action="{{ route('laporan-asset.index') }}" method="get">
                    <button type="submit" name="ganjil" class="btn btn-outline-primary w-100 mt-2">Semester
                        Ganjil {{ date('Y') }}</button>
                </form>
                <form action="{{ route('laporan-asset.pdf') }}" method="get" target="_blank">
                    <button type="submit" name="ganjil" class="btn btn-outline-primary w-100 mt-2">Export</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 btn-group">
                <form action="{{ route('laporan-asset.index') }}" method="get">
                    <button type="submit" name="genap" class="btn btn-outline-primary w-100 mt-2">Semester
                        Genap {{ date('Y') }}</button>
                </form>
                <form action="{{ route('laporan-asset.pdf') }}" method="get" target="_blank">
                    <button type="submit" name="genap" class="btn btn-outline-primary w-100 mt-2">Export</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 btn-group">
                <a href="#" data-bs-toggle="modal" data-bs-target="#showTahun"
                    class="btn btn-outline-primary w-100 mt-2">
                    <i data-feather="calendar"></i>&nbsp; Pilih Tahun
                </a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#printTahun"
                    class="btn btn-outline-primary w-100 mt-2">
                    <i data-feather="download-cloud"></i>&nbsp; Print
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table id="example" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Kode&nbsp;Asset</th>
                                <th>Nama&nbsp;Asset</th>
                                <th>Nama&nbsp;Barang</th>
                                <th>Tgl&nbsp;Perolehan</th>
                                <th>Nilai&nbsp;Satuan</th>
                                <th>Jumlah&nbsp;Unit</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                            <tr>
                                <td>{{ $asset->mappingAsset->kode_brg }}</td>
                                <td>{{ $asset->mappingAsset->nama_brg }}</td>
                                <td>
                                    @foreach ($asset->assetUmumPegawai->take(1) as $item)

                                    {{ $item->jenis_barang }} / {{ $item->merk_type }}
                                    @endforeach
                                </td>
                                <td>{{ $asset->tgl_perolehan }}</td>
                                <td>Rp.&nbsp;{{ number_format($asset->nilai_brg) }}</td>
                                <td>
                                    @if ($asset->kategori === 'KibB')
                                    {{ $asset->assetUmumPegawai->count() }}
                                    @else
                                    1
                                    @endif
                                </td>
                                <td>
                                    @if ($asset->kategori === 'KibB')
                                    Rp.&nbsp;{{ number_format($asset->nilai_brg * $asset->assetUmumPegawai->count()) }}
                                    @else
                                    Rp.&nbsp;{{ number_format($asset->nilai_brg * 1) }}
                                    @endif
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


<div class="modal fade" id="showTahun" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Cari Data Berdasarkan Tahun</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('laporan-asset.index') }}" method="GET">
                <div class="modal-body">
                    <select id="mySelect2" name="year" class="form-control js-example-basic-single" width="100%"
                        required>
                        {{ $last= date('Y')-100 }}
                        {{ $now = date('Y') }}
                        <option value="">Pilih Tahun</option>
                        @for ($i = $now; $i >= $last; $i--)

                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="printTahun" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Print Data Berdasarkan Tahun</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('laporan-asset.pdf') }}" method="GET" target="_blank">
                <div class="modal-body">
                    <select id="mySelect2" name="year" class="form-control js-example-basic-single" width="100%"
                        required>
                        {{ $last= date('Y')-100 }}
                        {{ $now = date('Y') }}
                        <option value="">Pilih Tahun</option>
                        @for ($i = $now; $i >= $last; $i--)

                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#mySelect2').select2({
            dropdownParent: $('#showTahun'),
            width: '100%'
        });
</script>
@endpush