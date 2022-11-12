@extends('layouts.adminKit')
@section('title','Edit KIB B ( Peralatan dan Mesin )')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('kib-b.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('kib-b.update',$kib->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Mapping Asset &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <select name="mapping_asset_id" class="form-control js-example-basic-single"
                                            width="100%" required>
                                            <option value="{{ $kib->mappingAsset->id }}">{{ $kib->mappingAsset->kode_brg
                                                }} - {{ $kib->mappingAsset->nama_brg }}</option>
                                            @foreach ($mapping as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode_brg }} - {{ $item->nama_brg
                                                }}</option>
                                            @endforeach
                                        </select>
                                        @error('mapping_asset_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tgl Perolehan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="tgl_perolehan"
                                            value="{{ old('tgl_perolehan') ?? $kib->tgl_perolehan }}"
                                            class="form-control @error('tgl_perolehan') is-invalid @enderror"
                                            type="date">
                                        @error('tgl_perolehan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="nilai_brg" id="nilaiBrg"
                                            value="{{ old('nilai_brg') ?? $kib->nilai_brg }}"
                                            class="form-control rupiah @error('nilai_brg') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Surut</label>
                                        <input name="nilai_surut" id="nilaiSurut"
                                            value="{{ old('nilai_surut') ?? $kib->nilai_surut }}"
                                            class="form-control rupiah @error('nilai_surut') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_surut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Penggunaan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <select name="penggunaan"
                                            class="form-control @error('penggunaan') is-invalid @enderror" required>
                                            <option value="{{ old('penggunaan') ?? $kib->penggunaan }}">{{
                                                old('penggunaan') ?? $kib->penggunaan }}</option>
                                            <option value="Kendaraan">Kendaraan</option>
                                            <option value="Lainnya">Lainnya (Ex: Laptop, Printer dll)b</option>
                                        </select>
                                        @error('penggunaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Keterangan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="keterangan" value="{{ old('keterangan') ?? $kib->keterangan }}"
                                            class="form-control @error('keterangan') is-invalid @enderror" type="text">
                                        @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penanggung Jawab &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <select
                                            class="js-example-basic-single form-control @error('penanggung_jawab') is-invalid @enderror"
                                            name="penanggung_jawab" style="width: 100%;">
                                            <option value="{{ old('penanggung_jawab') ?? $kib->penanggung_jawab }}">{{
                                                old('penanggung_jawab') ?? $kib->penanggung_jawab }}
                                            </option>
                                            <option value="Kadis">Kadis</option>
                                            <option value="Sekretariat">Sekretariat</option>
                                            <option value="Ketersediaan & Kerawanan">Ketersediaan & Kerawanan</option>
                                            <option value="Distribusi & Cadangan">Distribusi & Cadangan</option>
                                            <option value="Keamanan & Konsumsi">Keamanan & Konsumsi</option>
                                        </select>
                                        @error('penanggung_jawab')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="kategori" value="KibB">
                                    <div class="form-group mb-3">
                                        <label>Foto &nbsp;<span class="badge badge-danger">Max
                                                image 1
                                                MB</span></label>
                                        <div class="fallback">
                                            <input type="file" name="foto" value="{{ old('foto') ?? $kib->foto }}"
                                                class="form-control @error('foto') is-invalid @enderror">
                                            @if ($kib->foto === NULL)
                                            <span class="mt-20 text-primary">Image Null</span>
                                            @else
                                            <a href="{{ asset('umum/asset/kib-b/'.$kib->foto) }}"
                                                class="list-group-item mt-2" target="_blank">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-2">
                                                        <img src="{{ asset('umum/asset/kib-b/'.$kib->foto) }}"
                                                            class="avatar img-fluid rounded-circle"
                                                            alt="William Harris">
                                                    </div>
                                                    <div class="col-10 ps-2">
                                                        <div class="text-danger">{{ $kib->foto }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endif
                                            @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-12 col-lg-12">
                        <div class="card flex-fill px-2 pb-2">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Detail Pemakai Barang</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        @foreach ($kib->assetUmumPegawai as $assetPegawai)
                                        <div class="btn-group">
                                            <a class="btn btn-light mb-2">{{ $assetPegawai->pegawai->nama
                                                }}</a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#editPegawai-{{ $assetPegawai->id }}"
                                                class="btn btn-primary mb-2">Edit</a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#deletePegawai-{{ $assetPegawai->id }}"
                                                class="btn btn-danger mb-2">Hapus</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">

                                        <table id="dynamicTable">

                                        </table>
                                        <div class="mt-3">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add
                                                More</button>
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i data-feather="save"></i>&nbsp;
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

@include('umum.asset.kib-b.modalPemakai.edit')
@include('umum.asset.kib-b.modalPemakai.delete')

@endsection

@push('js')
<script type="text/javascript">
    var i = 0;
       
    $("#add").click(function(){
   
        ++i; 
   
        $("#dynamicTable").append('<tr><td><div class="row"><div class="col-lg-6 col-12"><div class="form-group mb-3"><label>Pemakai &nbsp;<sup class="text-danger">(wajib diisi)</sup></label><select class="js-example-basic-single form-control @error('pegawai_id') is-invalid @enderror" id="pemakai" name="addmore['+i+'][pegawai_id]" style="width: 100%;" required><option value="">Pilih pemakai</option>@foreach ($pegawai as $item)<option value="{{ $item->id }}">{{ $item->nama }}</option>@endforeach</select>@error('pemakai')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div><div class="col-lg-6 col-12"><div class="form-group mb-3"><label>Jenis Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label><input name="addmore['+i+'][jenis_barang]" value="{{ old('jenis_barang') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Merk/Type &nbsp;<sup class="text-danger">(wajib diisi)</sup></label><input name="addmore['+i+'][merk_type]" value="{{ old('merk_type') }}" class="form-control" type="text" required></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Polisi</label><input name="addmore['+i+'][nopol]" value="{{ old('nopol') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Ukuran</label><input name="addmore['+i+'][ukuran]" value="{{ old('ukuran') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Bahan Warna</label><input name="addmore['+i+'][bahan_warna]" value="{{ old('bahan_warna') }}" class="form-control " type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Spesifikasi</label><input name="addmore['+i+'][spesifikasi]" value="{{ old('spesifikasi') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Pabrik</label><input name="addmore['+i+'][no_pabrik]" value="{{ old('no_pabrik') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Rangka</label><input name="addmore['+i+'][no_rangka]" value="{{ old('no_rangka') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Mesin</label><input name="addmore['+i+'][no_mesin]" value="{{ old('no_mesin') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>BPKB</label><input name="addmore['+i+'][bpkb]" value="{{ old('bpkb') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>STNK</label><input name="addmore['+i+'][stnk]" value="{{ old('stnk') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Masa Manfaat</label><input name="addmore['+i+'][masa_manfaat]" value="{{ old('masa_manfaat') }}" class="form-control" type="number"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Sisa Manfaat</label><input name="addmore['+i+'][sisa_manfaat]" value="{{ old('sisa_manfaat') }}" class="form-control" type="number"></div></div><input type="hidden" name="kategori" value="KibB"></div><button type="button" class="btn btn-danger mt-3 mb-4 remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   

</script>
@endpush