<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Kegiatan - {{ $realisasi->name_kegiatan }}</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="realisasi_id" value="{{ $realisasi->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Kegiatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan') }}" placeholder="ex : Penyusunan Dokumen Perencanaan Perangkat Daerah" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>APBD Murni {{ $realisasi->tahun }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="apbd_murni" class="form-control" value="{{ old('apbd_murni') }}" placeholder="ex : 8499716" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Refocusing {{ $realisasi->tahun }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="refocusing" class="form-control" value="{{ old('refocusing') }}" placeholder="ex : 8499716" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>APBD-P {{ $realisasi->tahun }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="apbd_p" class="form-control" value="{{ old('apbd_p') }}" placeholder="ex : 8499716" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Realisasi Keuangan (Rp)</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="realisasi_keuangan" class="form-control" value="{{ old('realisasi_keuangan') }}" placeholder="ex : 8499716" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Realisasi Fisik (%)</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="realisasi_fisik" class="form-control" value="{{ old('realisasi_fisik') }}" placeholder="ex : 100" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Seharusnya (%)</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="seharusnya" class="form-control" value="{{ old('seharusnya') }}" placeholder="ex : 100" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}" placeholder="ex : 2021" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
@foreach($realisasi->kegiatan as $data)
<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Kegiatan - {{ $realisasi->name_kegiatan }}</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kegiatan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Kegiatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_kegiatan" class="form-control" value="{{ $data->nama_kegiatan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>APBD Murni {{ $realisasi->tahun }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="apbd_murni" class="form-control" value="{{ $data->apbd_murni }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Refocusing {{ $realisasi->tahun }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="refocusing" class="form-control" value="{{ $data->refocusing }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>APBD-P {{ $realisasi->tahun }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="apbd_p" class="form-control" value="{{ $data->apbd_p }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Realisasi Keuangan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="realisasi_keuangan" class="form-control" value="{{ $data->realisasi_keuangan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Realisasi Fisik</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="realisasi_fisik" class="form-control" value="{{ $data->realisasi_fisik }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Seharusnya</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="seharusnya" class="form-control" value="{{ $data->seharusnya }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ $data->tahun }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal delete -->
@foreach($realisasi->kegiatan as $data)
<div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Hapus Kegiatan - {{ $realisasi->name_kegiatan }}</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kegiatan.destroy', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin mengapus data <strong>{{ $data->nama_kegiatan }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach