@extends('layouts.adminKit')
@section('title','Create KIB B ( Peralatan dan Mesin )')

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

        <form action="{{ route('kib-b.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                            <option value="">Pilih Mapping Asset</option>
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
                                        <input name="tgl_perolehan" value="{{ old('tgl_perolehan') }}"
                                            class="form-control @error('tgl_perolehan') is-invalid @enderror"
                                            type="date">
                                        @error('tgl_perolehan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="nilai_brg" id="nilaiBrg" value="{{ old('nilai_brg') }}"
                                            class="form-control rupiah @error('nilai_brg') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Surut</label>
                                        <input name="nilai_surut" id="nilaiSurut" value="{{ old('nilai_surut') }}"
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
                                            <option value="{{ old('penggunaan') }}">{{ old('penggunaan') ?? 'Pilih
                                                penggunaan' }}</option>
                                            <option value="Kendaraan">Kendaraan</option>
                                            <option value="Lainnya">Lainnya (Ex: Laptop, Printer dll)</option>
                                        </select>
                                        @error('penggunaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Keterangan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="keterangan" value="{{ old('keterangan') }}"
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
                                            <option value="{{ old('penanggung_jawab') ?? '' }}">{{
                                                old('penanggung_jawab') ?? 'Pilih penanggung jawab' }}
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
                                            <input type="file" name="foto" value="{{ old('foto') }}"
                                                class="form-control @error('foto') is-invalid @enderror">
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
                                {{-- <a target="_blank"
                                    href="https://www.itsolutionstuff.com/post/add-remove-multiple-input-fields-dynamically-with-jquery-laravel-58example.html">
                                </a> --}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <table id="dynamicTable">
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Pemakai &nbsp;<sup class="text-danger">(wajib
                                                                        diisi)</sup></label>
                                                                <select
                                                                    class="js-example-basic-single form-control @error('pegawai_id') is-invalid @enderror"
                                                                    name="addmore[0][pegawai_id]" id="pemakai"
                                                                    style="width: 100%;" required>
                                                                    <option value="">Pilih pemakai</option>
                                                                    @foreach ($pegawai as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('pemakai')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Jenis Barang &nbsp;<sup
                                                                        class="text-danger">(wajib
                                                                        diisi)</sup></label>
                                                                <input name="addmore[0][jenis_barang]"
                                                                    value="{{ old('jenis_barang') }}"
                                                                    class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Merk/Type &nbsp;<sup class="text-danger">(wajib
                                                                        diisi)</sup></label>
                                                                <input name="addmore[0][merk_type]"
                                                                    value="{{ old('merk_type') }}" class="form-control"
                                                                    type="text" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Nomor Polisi</label>
                                                                <input name="addmore[0][nopol]"
                                                                    value="{{ old('nopol') }}" class="form-control"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Ukuran</label>
                                                                <input name="addmore[0][ukuran]"
                                                                    value="{{ old('ukuran') }}" class="form-control"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Bahan Warna</label>
                                                                <input name="addmore[0][bahan_warna]"
                                                                    value="{{ old('bahan_warna') }}"
                                                                    class="form-control " type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Spesifikasi</label>
                                                                <input name="addmore[0][spesifikasi]"
                                                                    value="{{ old('spesifikasi') }}"
                                                                    class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Nomor Pabrik</label>
                                                                <input name="addmore[0][no_pabrik]"
                                                                    value="{{ old('no_pabrik') }}" class="form-control"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Nomor Rangka</label>
                                                                <input name="addmore[0][no_rangka]"
                                                                    value="{{ old('no_rangka') }}" class="form-control"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Nomor Mesin</label>
                                                                <input name="addmore[0][no_mesin]"
                                                                    value="{{ old('no_mesin') }}" class="form-control"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>BPKB</label>
                                                                <input name="addmore[0][bpkb]" value="{{ old('bpkb') }}"
                                                                    class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>STNK</label>
                                                                <input name="addmore[0][stnk]" value="{{ old('stnk') }}"
                                                                    class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Masa Manfaat</label>
                                                                <input name="addmore[0][masa_manfaat]"
                                                                    value="{{ old('masa_manfaat') }}"
                                                                    class="form-control" type="number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Sisa Manfaat</label>
                                                                <input name="addmore[0][sisa_manfaat]"
                                                                    value="{{ old('sisa_manfaat') }}"
                                                                    class="form-control" type="number">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="mt-3">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add
                                                More</button>
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i data-feather="save"></i>&nbsp;
                                                Simpan
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
@endsection

@push('js')
<script type="text/javascript">
    var i = 0;
       
    $("#add").click(function(){
   
        ++i; 
   
        $("#dynamicTable").append('<tr><td><div class="row"><div class="col-lg-6 col-12"><div class="form-group mb-3"><label>Pemakai &nbsp;<sup class="text-danger">(wajib diisi)</sup></label><select class="js-example-basic-single form-control @error('pegawai_id') is-invalid @enderror" id="pemakai" name="addmore['+i+'][pegawai_id]" style="width: 100%;" required><option value="">Pilih pemakai</option>@foreach ($pegawai as $item)<option value="{{ $item->id }}">{{ $item->nama }}</option>@endforeach</select>@error('pemakai')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div><div class="col-lg-6 col-12"><div class="form-group mb-3"><label>Jenis Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label><input name="addmore['+i+'][jenis_barang]" value="{{ old('jenis_barang') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Merk/Type &nbsp;<sup class="text-danger">(wajib diisi)</sup></label><input name="addmore['+i+'][merk_type]" value="{{ old('merk_type') }}" class="form-control" type="text" required></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Polisi</label><input name="addmore['+i+'][nopol]" value="{{ old('nopol') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Ukuran</label><input name="addmore['+i+'][ukuran]" value="{{ old('ukuran') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Bahan Warna</label><input name="addmore['+i+'][bahan_warna]" value="{{ old('bahan_warna') }}" class="form-control " type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Spesifikasi</label><input name="addmore['+i+'][spesifikasi]" value="{{ old('spesifikasi') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Pabrik</label><input name="addmore['+i+'][no_pabrik]" value="{{ old('no_pabrik') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Rangka</label><input name="addmore['+i+'][no_rangka]" value="{{ old('no_rangka') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Nomor Mesin</label><input name="addmore['+i+'][no_mesin]" value="{{ old('no_mesin') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>BPKB</label><input name="addmore['+i+'][bpkb]" value="{{ old('bpkb') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>STNK</label><input name="addmore['+i+'][stnk]" value="{{ old('stnk') }}" class="form-control" type="text"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Masa Manfaat</label><input name="addmore['+i+'][masa_manfaat]" value="{{ old('masa_manfaat') }}" class="form-control" type="number"></div></div><div class="col-lg-3 col-12"><div class="form-group mb-3"><label>Sisa Manfaat</label><input name="addmore['+i+'][sisa_manfaat]" value="{{ old('sisa_manfaat') }}" class="form-control" type="number"></div></div><input type="hidden" name="kategori" value="KibB"></div><button type="button" class="btn btn-danger mt-3 mb-3 remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   

</script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
@endpush

{{-- @push('js')
<script>
    $(document).ready(function(){   
        $("#nilaiBrg, #nilaiSurut").keyup(function(){
            var nilaiBrg = $("#nilaiBrg").val();
            var nilaiSurut = $("#nilaiSurut").val();
            if (nilaiSurut !== '') {
                var nilaiTotal = parseInt(nilaiBrg) * 1 - parseInt(nilaiSurut);
            } else {
                var nilaiTotal = parseInt(nilaiBrg) * 1
            }
            $("#nilaiTotal").val(nilaiTotal);
        });
    });
</script>
@endpush --}}

{{-- $(".pemakai").change(function(){
var count = 0;
$.each($(".pemakai option:selected"), function(){
++count;
});
var jumlahHasil = $("#hasil").val(+ count);
});

$("#nilaiBrg").keyup(function() {
var jumlahHasil = $("#hasil").val();
var nilaiBrg = $("#nilaiBrg").val();
var nilaiTotal = parseInt(jumlahHasil) * parseInt(nilaiBrg);
$("#nilaiTotal").val(function(){
return nilaiTotal;
});
}); --}}