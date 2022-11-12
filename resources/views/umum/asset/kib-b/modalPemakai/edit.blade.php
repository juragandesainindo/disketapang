@foreach ($kib->assetUmumPegawai as $assetPegawai)
<div class="modal fade" id="editPegawai-{{ $assetPegawai->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pemakai Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('asset-umum-pegawai.update',$assetPegawai->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
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
                                                name="pegawai_id" id="pemakai" style="width: 100%;" required>
                                                <option value="{{ $assetPegawai->pegawai->id }}">{{
                                                    $assetPegawai->pegawai->nama }}</option>
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
                                            <label>Jenis Barang &nbsp;<sup class="text-danger">(wajib
                                                    diisi)</sup></label>
                                            <input name="jenis_barang"
                                                value="{{ old('jenis_barang') ?? $assetPegawai->jenis_barang }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Merk/Type &nbsp;<sup class="text-danger">(wajib
                                                    diisi)</sup></label>
                                            <input name="merk_type"
                                                value="{{ old('merk_type') ?? $assetPegawai->merk_type }}"
                                                class="form-control" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Nomor Polisi</label>
                                            <input name="nopol" value="{{ old('nopol') ?? $assetPegawai->nopol }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Ukuran</label>
                                            <input name="ukuran" value="{{ old('ukuran') ?? $assetPegawai->ukuran }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Bahan Warna</label>
                                            <input name="bahan_warna"
                                                value="{{ old('bahan_warna') ?? $assetPegawai->bahan_warna }}"
                                                class="form-control " type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Spesifikasi</label>
                                            <input name="spesifikasi"
                                                value="{{ old('spesifikasi') ?? $assetPegawai->spesifikasi }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Nomor Pabrik</label>
                                            <input name="no_pabrik"
                                                value="{{ old('no_pabrik') ?? $assetPegawai->no_pabrik }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Nomor Rangka</label>
                                            <input name="no_rangka"
                                                value="{{ old('no_rangka') ?? $assetPegawai->no_rangka }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Nomor Mesin</label>
                                            <input name="no_mesin"
                                                value="{{ old('no_mesin') ?? $assetPegawai->no_mesin }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>BPKB</label>
                                            <input name="bpkb" value="{{ old('bpkb') ?? $assetPegawai->bpkb }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>STNK</label>
                                            <input name="stnk" value="{{ old('stnk') ?? $assetPegawai->stnk }}"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Masa Manfaat</label>
                                            <input name="masa_manfaat"
                                                value="{{ old('masa_manfaat') ?? $assetPegawai->masa_manfaat }}"
                                                class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group mb-3">
                                            <label>Sisa Manfaat</label>
                                            <input name="sisa_manfaat"
                                                value="{{ old('sisa_manfaat') ?? $assetPegawai->sisa_manfaat }}"
                                                class="form-control" type="number">
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach