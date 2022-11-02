<!-- Modal add  -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Data </strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('evaluasi-renstra-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Indikator</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="indikator" class="form-control" required>
                                    <option value="">Pilih salah satu</option>
                                    <option value="Nilai Indeks Kepuasan Masyarakat (IKM)">Nilai Indeks Kepuasan
                                        Masyarakat (IKM)</option>
                                    <option value="Nilai Akuntabilitas Kinerja Instansi Pemerintahan (AKIP)">Nilai
                                        Akuntabilitas Kinerja Instansi Pemerintahan (AKIP)</option>
                                    <option value="Skor Pola Pangan Harapan (PPH) Ketersediaan">Skor Pola Pangan Harapan
                                        (PPH) Ketersediaan</option>
                                    <option value="Skor Pola Pangan Harapan (PPH) Konsumsi">Skor Pola Pangan Harapan
                                        (PPH) Konsumsi</option>
                                    <option value="Tingkat Capaian Konsumsi Energi (kkal/ kapita)">Tingkat Capaian
                                        Konsumsi Energi (kkal/ kapita)</option>
                                    <option value="Tingkat Capaian Konsumsi Protein (gram/ kapita)">Tingkat Capaian
                                        Konsumsi Protein (gram/ kapita)</option>
                                    <option value="Batas Maksimum Residu (BMR)">Batas Maksimum Residu (BMR)</option>
                                    <option value="Indeks Ketahanan Pangan">Indeks Ketahanan Pangan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Target</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="target" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Realisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="realisasi" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Rasio</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="rasio" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit  -->
@switch($edit)
@case(1)
@foreach($renstra as $data)
<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Data </strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('evaluasi-renstra.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Indikator</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="indikator" class="form-control">
                                    <option value="{{ $data->indikator }}">{{ $data->indikator }}</option>
                                    <option value="Nilai Indeks Kepuasan Masyarakat (IKM)">Nilai Indeks Kepuasan
                                        Masyarakat (IKM)</option>
                                    <option value="Nilai Akuntabilitas Kinerja Instansi Pemerintahan (AKIP)">Nilai
                                        Akuntabilitas Kinerja Instansi Pemerintahan (AKIP)</option>
                                    <option value="Skor Pola Pangan Harapan (PPH) Ketersediaan">Skor Pola Pangan Harapan
                                        (PPH) Ketersediaan</option>
                                    <option value="Skor Pola Pangan Harapan (PPH) Konsumsi">Skor Pola Pangan Harapan
                                        (PPH) Konsumsi</option>
                                    <option value="Tingkat Capaian Konsumsi Energi (kkal/ kapita)">Tingkat Capaian
                                        Konsumsi Energi (kkal/ kapita)</option>
                                    <option value="Tingkat Capaian Konsumsi Protein (gram/ kapita)">Tingkat Capaian
                                        Konsumsi Protein (gram/ kapita)</option>
                                    <option value="Batas Maksimum Residu (BMR)">Batas Maksimum Residu (BMR)</option>
                                    <option value="Indeks Ketahanan Pangan">Indeks Ketahanan Pangan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Target</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="target" value="{{ $data->target }}" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Realisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="realisasi" value="{{ $data->realisasi }}" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Rasio</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="rasio" value="{{ $data->rasio }}" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" value="{{ $data->tahun }}" class="form-control"
                                    required>
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
@break
@endswitch

<!-- Modal delete  -->
@switch($delete)
@case(1)
@foreach($renstra as $data)
<div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Hapus Data </strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('evaluasi-renstra.destroy',$data->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus indikator <strong>{{ $data->indikator }}</strong> tahun
                    <strong>{{ $data->tahun }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@break
@endswitch