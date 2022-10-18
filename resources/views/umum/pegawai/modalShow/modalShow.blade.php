<!-- add Pangkat -->
<div class="modal fade" id="addPangkat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Kepangakatan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pangkat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pangkat/Golongan</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="nama_pangkat" class="form-control" required>
                                    <option disable selected>Pilih salah satu</option>
                                    <optgroup label="Golongan I (Juru)">
                                        <option value="Juru Muda, I/a">Juru Muda, I/a</option>
                                        <option value="Juru Muda Tk. I, I/b">Juru Muda Tk. I, I/b</option>
                                        <option value="Juru, I/c">Juru, I/c</option>
                                        <option value="Juru Tk. I, I/d">Juru Tk. I, I/d</option>
                                    </optgroup>
                                    <optgroup label="Golongan II (Pengatur)">
                                        <option value="Pengatur Muda, II/a">Pengatur Muda, II/a</option>
                                        <option value="Pengatur Muda Tk. I, II/b">Pengatur Muda Tk. I, II/b</option>
                                        <option value="Pengatur, II/c">Pengatur, II/c</option>
                                        <option value="Pengatur Tk. I, II/d">Pengatur Tk. I, II/d</option>
                                    </optgroup>
                                    <optgroup label="Golongan III (Penata)">
                                        <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                                        <option value="Penata Muda Tk. I, III/b">Penata Muda Tk. I, III/b</option>
                                        <option value="Penata, III/c">Penata, III/c</option>
                                        <option value="Penata Tk. I, III/d">Penata Tk. I, III/d</option>
                                    </optgroup>
                                    <optgroup label="Golongan IV (Pembina)">
                                        <option value="Pembina, IV/a">Pembina, IV/a</option>
                                        <option value="Pembina Tk. I, IV/b">Pembina Tk. I, IV/b</option>
                                        <option value="Pembina Utama Muda, IV/c">Pembina Utama Muda, IV/c</option>
                                        <option value="Pembina Utama Madya, IV/d">Pembina Utama Madya, IV/d</option>
                                        <option value="Pembina Utama, IV/e">Pembina Utama, IV/e</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>No SK</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="no_sk" class="form-control" value="{{ old('no_sk') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl SK</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tgl_sk" value="{{ old('tgl_sk') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>TMT Pangkat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tmt_pangkat" value="{{ old('tmt_pangkat') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pangkat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Pangkat -->

<!-- add Jabatan -->
<div class="modal fade" id="addJabatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Jabatan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-jabatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_jabatan" class="form-control"
                                    value="{{ old('nama_jabatan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Eselon</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="eselon" class="form-control" value="{{ old('eselon') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>TMT Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tmt_jabatan" value="{{ old('tmt_jabatan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Akhir Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="akhir_jabatan" value="{{ old('akhir_jabatan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Jabatan -->

<!-- add Pendidikan Umum -->
<div class="modal fade" id="addPendidikanUmum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Pendidikan Umum</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pendidikan-umum.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jenjang Pendidikan</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="jenjang_pendidikan" class="form-control" required>
                                    <option disabled selected>Pilih salah satu</option>
                                    <option value="SD">SD</option>
                                    <option value="SLTP">SLTP</option>
                                    <option value="SLTA">SLTA</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jurusan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Sekolah</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_sekolah" class="form-control"
                                    value="{{ old('nama_sekolah') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun Lulus</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun_lulus" class="form-control"
                                    value="{{ old('tahun_lulus') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pendidikan Umum</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Pendidikan Umum -->

<!-- add Pelatihan Kepemimpinan -->
<div class="modal fade" id="addPelatihanKepemimpinan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Pelatihan Kepemimpinan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pelatihan-kepemimpinan.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Diklat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_diklat" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Angkatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Panitia Penyelenggara</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="panitia" class="form-control" value="{{ old('panitia') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pelatihan Kepemimpinan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Pelatihan Kepemimpinan -->

<!-- add Pelatihan Teknis -->
<div class="modal fade" id="addPelatihanTeknis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Pelatihan Teknis & Pelatihan Fungsional</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pelatihan-teknis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Diklat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_diklat" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Angkatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Panitia Penyelenggara</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="panitia" class="form-control" value="{{ old('panitia') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pelatihan Teknis</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Pelatihan Teknis -->

<!-- add Organisasi -->
<div class="modal fade" id="addOrganisasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Organisasi</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-organisasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Organisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_organisasi" class="form-control"
                                    value="{{ old('nama_organisasi') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Kedudukan Dalam Organisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="kedudukan" class="form-control" value="{{ old('kedudukan') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Pimpinan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_pimpinan" class="form-control"
                                    value="{{ old('nama_pimpinan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Organisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Organisasi -->

<!-- add Penghargaan -->
<div class="modal fade" id="addPenghargaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Penghargaan / Tanda Jasa</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Penghargaan / Tanda Jasa</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="penghargaan" class="form-control"
                                    value="{{ old('penghargaan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Asal Perolehan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="asal_perolehan" class="form-control"
                                    value="{{ old('asal_perolehan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Penghargaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Penghargaan -->

<!-- add Pasangan -->
<div class="modal fade" id="addPasangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Pasangan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pasangan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Pasangan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_pasangan" class="form-control"
                                    value="{{ old('nama_pasangan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ old('tempat_lahir') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Nikah</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tgl_nikah" value="{{ old('tgl_nikah') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pasangan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Pasangan -->

<!-- add Anak -->
<div class="modal fade" id="addAnak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Anak</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-anak.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Anak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_anak" class="form-control" value="{{ old('nama_anak') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ old('tempat_lahir') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Status Anak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="status_anak" class="form-control"
                                    value="{{ old('status_anak') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Anak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Anak -->

<!-- add Ortu -->
<div class="modal fade" id="addOrtu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Ortu</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-ortu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Orang Tua</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_ortu" class="form-control" value="{{ old('nama_ortu') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ old('tempat_lahir') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Status</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="status_ortu" class="form-control" required>
                                    <option disabled selected>Pilih salah satu</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Ibu">Ibu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Orang Tua</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
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
<!-- end add Ortu -->

<!-- add Dokumen Pegawai -->
<div class="modal fade" id="addDokumenPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Dokumen Pegawai</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-dokumen-pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="keterangan" class="form-control" required>
                                    <option disabled selected>Pilih salah satu</option>
                                    <option value="KTP">KTP</option>
                                    <option value="KK">Kartu Keluarga</option>
                                    <option value="Akte Kelahiran">Akte Kelahiran</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="NPWP">NPWP</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="image_pegawai" class="form-control" required>
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
<!-- end add Dokumen Pegawai -->

<!-- add Gaji Berkala -->
<div class="modal fade" id="addGaji" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Data</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-gaji-berkala.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pangkat</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="pangkat_id" class="form-control" required>
                                    <option disabled selected>Pilih salah satu</option>
                                    @foreach($pegawai->pangkat as $gajiPangkat)
                                    <option value="{{ $gajiPangkat->id }}">{{ $gajiPangkat->nama_pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>TMT KGB</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="date" name="tmt_kgb" value="{{ old('tmt_kgb') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Gaji Pokok</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" name="gaji_pokok" class="form-control"
                                    value="{{ old('gaji_pokok') }}" required>
                                <span class="text-danger">*Tanpa harus menambahkan tanda titik(.) atau koma(,)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Masa Kerja</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="masa_kerja" class="form-control"
                                    value="{{ old('masa_kerja') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Gaji Berkala</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="file" class="form-control" value="{{ old('file') }}" required>
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
<!-- end add Gaji Berkala -->

@switch($editPangkat)
@case(1)
@foreach($pegawai->pangkat as $item)
<div class="modal fade" id="editPangkat-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Kepangkatan - {{ $item->nama_pangkat }}</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pangkat.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pangkat</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="nama_pangkat" class="form-control" required>
                                    <option value="{{ $item->nama_pangkat }}">{{ $item->nama_pangkat }}</option>
                                    <optgroup label="Golongan I (Juru)">
                                        <option value="Juru Muda, I/a">Juru Muda, I/a</option>
                                        <option value="Juru Muda Tk. I, I/b">Juru Muda Tk. I, I/b</option>
                                        <option value="Juru, I/c">Juru, I/c</option>
                                        <option value="Juru Tk. I, I/d">Juru Tk. I, I/d</option>
                                    </optgroup>
                                    <optgroup label="Golongan II (Pengatur)">
                                        <option value="Pengatur Muda, II/a">Pengatur Muda, II/a</option>
                                        <option value="Pengatur Muda Tk. I, II/b">Pengatur Muda Tk. I, II/b</option>
                                        <option value="Pengatur, II/c">Pengatur, II/c</option>
                                        <option value="Pengatur Tk. I, II/d">Pengatur Tk. I, II/d</option>
                                    </optgroup>
                                    <optgroup label="Golongan III (Penata)">
                                        <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                                        <option value="Penata Muda Tk. I, III/b">Penata Muda Tk. I, III/b</option>
                                        <option value="Penata, III/c">Penata, III/c</option>
                                        <option value="Penata Tk. I, III/d">Penata Tk. I, III/d</option>
                                    </optgroup>
                                    <optgroup label="Golongan IV (Pembina)">
                                        <option value="Pembina, IV/a">Pembina, IV/a</option>
                                        <option value="Pembina Tk. I, IV/b">Pembina Tk. I, IV/b</option>
                                        <option value="Pembina Utama Muda, IV/c">Pembina Utama Muda, IV/c</option>
                                        <option value="Pembina Utama Madya, IV/d">Pembina Utama Madya, IV/d</option>
                                        <option value="Pembina Utama, IV/e">Pembina Utama, IV/e</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>No SK</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="no_sk" class="form-control" value="{{ $item->no_sk }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl SK</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tgl_sk" value="{{ $item->tgl_sk->isoFormat('DD-MM-Y') }}"
                                    required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>TMT Pangkat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tmt_pangkat" value="{{ $item->tmt_pangkat }}" required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Foto Dokumen</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control">
                                <span style="margin-top: 10px;"><a href="{{ asset('umum/pegawai/'.$item->foto) }}"
                                        class="text-danger" target="_blank">{{ $item->foto }}</a></span>
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

@switch($editJabatan)
@case(1)
@foreach($pegawai->jabatan as $item)
<div class="modal fade" id="editJabatan-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Jabatan - </strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-jabatan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_jabatan" class="form-control"
                                    value="{{ $item->nama_jabatan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Eselon</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="eselon" class="form-control" value="{{ $item->eselon }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>TMT Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tmt_jabatan"
                                    value="{{ $item->tmt_jabatan->isoFormat('DD-MM-Y') }}" required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Akhir Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="akhir_jabatan"
                                    value="{{ $item->akhir_jabatan->isoFormat('DD-MM-Y') }}" required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Foto Dokumen</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control">
                                <span style="margin-top: 10px;"><a
                                        href="{{ asset('umum/pegawai/jabatan/'.$item->foto) }}" class="text-danger"
                                        target="_blank">{{ $item->foto }}</a></span>
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

@switch($editPendidikanUmum)
@case(1)
@foreach($pegawai->pendidikan as $item)
<div class="modal fade" id="editPendidikanUmum-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Pendidikan Umum</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pendidikan-umum.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jenjang Pendidikan</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="jenjang_pendidikan" class="form-control">
                                    <option value="{{ $item->jenjang_pendidikan }}">{{ $item->jenjang_pendidikan }}
                                    </option>
                                    <option value="SD">SD</option>
                                    <option value="SLTP">SLTP</option>
                                    <option value="SLTA">SLTA</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jurusan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="jurusan" class="form-control" value="{{ $item->jurusan }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Sekolah</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_sekolah" class="form-control"
                                    value="{{ $item->nama_sekolah }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun Lulus</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun_lulus" class="form-control"
                                    value="{{ $item->tahun_lulus }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pendidikan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <a href="{{ asset('umum/pegawai/pendidikan-umum/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('umum/pegawai/pendidikan-umum/'.$item->foto) }}" height="100px">
                                </a>
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

@switch($editPelatihanKepemimpinan)
@case(1)
@foreach($pegawai->pelatihankepemimpinan as $item)
<div class="modal fade" id="editPelatihanKepemimpinan-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Pelatihan Kepemimpinan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pelatihan-kepemimpinan.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Diklat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_diklat" class="form-control"
                                    value="{{ $item->nama_diklat }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Angkatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="angkatan" class="form-control" value="{{ $item->angkatan }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ $item->tahun }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat" class="form-control" value="{{ $item->tempat }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Panitia Penyelenggara</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="panitia" class="form-control" value="{{ $item->panitia }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pelatihan Kepemimpinan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <a href="{{ asset('umum/pegawai/pelatihan-kepemimpinan/'.$item->foto) }}">
                                    <img src="{{ asset('umum/pegawai/pelatihan-kepemimpinan/'.$item->foto) }}"
                                        width="100px">
                                </a>
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

@switch($editPelatihanTeknis)
@case(1)
@foreach($pegawai->pelatihanteknis as $item)
<div class="modal fade" id="editPelatihanTeknis-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Pelatihan Kepemimpinan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pelatihan-teknis.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Diklat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_diklat" class="form-control"
                                    value="{{ $item->nama_diklat }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Angkatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="angkatan" class="form-control" value="{{ $item->angkatan }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ $item->tahun }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat" class="form-control" value="{{ $item->tempat }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Panitia Penyelenggara</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="panitia" class="form-control" value="{{ $item->panitia }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pelatihan Teknis</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <img src="{{ asset('umum/pegawai/pelatihan-teknis/'.$item->foto) }}" width="100px">
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

@switch($editOrganisasi)
@case(1)
@foreach($pegawai->organisasi as $item)
<div class="modal fade" id="editOrganisasi-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Organisasi</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-organisasi.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Organisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_organisasi" class="form-control"
                                    value="{{ $item->nama_organisasi }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Kedudukan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="kedudukan" class="form-control" value="{{ $item->kedudukan }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat" class="form-control" value="{{ $item->tempat }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Pimpinan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_pimpinan" class="form-control"
                                    value="{{ $item->nama_pimpinan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Organisasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <img src="{{ asset('umum/pegawai/organisasi/'.$item->foto) }}" width="100px">
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

@switch($editPenghargaan)
@case(1)
@foreach($pegawai->penghargaan as $item)
<div class="modal fade" id="editPenghargaan-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Penghargaan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-penghargaan.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Penghargaan / Tanda Jasa</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="penghargaan" class="form-control"
                                    value="{{ $item->penghargaan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tahun</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tahun" class="form-control" value="{{ $item->tahun }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Asal Perolehan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="asal_perolehan" class="form-control"
                                    value="{{ $item->asal_perolehan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Asal Perolehan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <img src="{{ asset('umum/pegawai/penghargaan/'.$item->foto) }}" width="100px">
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

@switch($editPasangan)
@case(1)
@foreach($pegawai->pasangan as $item)
<div class="modal fade" id="editPasangan-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Pasangan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-pasangan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Pasangan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_pasangan" class="form-control"
                                    value="{{ $item->nama_pasangan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ $item->tempat_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tgl_lahir" value="{{ $item->tgl_lahir->isoFormat('DD-MM-Y') }}"
                                    required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Nikah</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tgl_nikah" value="{{ $item->tgl_nikah->isoFormat('DD-MM-Y') }}"
                                    required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="pekerjaan" class="form-control" value="{{ $item->pekerjaan }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Pasangan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <img src="{{ asset('umum/pegawai/pasangan/'.$item->foto) }}" width="100px">
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

@switch($editAnak)
@case(1)
@foreach($pegawai->anak as $item)
<div class="modal fade" id="editAnak-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Anak</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-anak.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Anak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_anak" class="form-control" value="{{ $item->nama_anak }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ $item->tempat_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tgl_lahir" value="{{ $item->tgl_lahir->isoFormat('DD-MM-Y') }}"
                                    required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Status Anak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="status_anak" class="form-control"
                                    value="{{ $item->status_anak }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="pekerjaan" class="form-control" value="{{ $item->pekerjaan }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Anak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <img src="{{ asset('umum/pegawai/anak/'.$item->foto) }}" width="100px">
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

@switch($editOrtu)
@case(1)
@foreach($pegawai->ortu as $item)
<div class="modal fade" id="editOrtu-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Ortu</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-ortu.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Nama Orang Tua</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="nama_ortu" class="form-control" value="{{ $item->nama_ortu }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ $item->tempat_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tgl Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tgl_lahir" value="{{ $item->tgl_lahir->isoFormat('DD-MM-Y') }}"
                                    required><br>
                                <span class="text-danger">Format: Tanggal-Bulan-Tahun (Ex: 31-01-2021)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Status Orang Tua</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="status_ortu" class="form-control">
                                    <option value="{{ $item->status_ortu }}">{{ $item->status_ortu }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="pekerjaan" class="form-control" value="{{ $item->pekerjaan }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Orang Tua</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="foto" class="form-control" value="{{ $item->foto }}">
                                <img src="{{ asset('umum/pegawai/ortu/'.$item->foto) }}" width="100px">
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

@switch($editDokumenPegawai)
@case(1)
@foreach($pegawai->image as $item)
<div class="modal fade" id="editDokumenPegawai-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Dokumen Pegawai</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-dokumen-pegawai.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="keterangan" class="form-control">
                                    <option value="{{ $item->keterangan }}">{{ $item->keterangan }}</option>
                                    <option value="KTP">KTP</option>
                                    <option value="KK">Kartu Keluarga</option>
                                    <option value="Akte Kelahiran">Akte Kelahiran</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="NPWP">NPWP</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="image_pegawai" class="form-control">
                                <img src="{{ asset('umum/pegawai/dokumen/'.$item->image_pegawai) }}" width="100px">
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

<!-- edit Gaji Berkala -->
@switch($editGaji)
@case(1)
@foreach($pegawai->pegawaiGaji as $item)
<div class="modal fade" id="editGaji-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Data</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai-gaji-berkala.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pangkat</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="pangkat_id" class="form-control" required>
                                    <option value="{{ $item->pangkat->id }}">{{ $item->pangkat->nama_pangkat }}</option>
                                    @foreach($pegawai->pangkat as $gajiPangkat)
                                    <option value="{{ $gajiPangkat->id }}">{{ $gajiPangkat->nama_pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Jabatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="jabatan" class="form-control" value="{{ $item->jabatan }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>TMT KGB</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="tmt_kgb" value="{{ $item->tmt_kgb->isoFormat('DD-MM-Y') }}"
                                    required><br>
                                <span class="text-danger">Format : Tanggal-Bulan-Tahun</span> Ex : 25-08-2021
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Gaji Pokok</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="gaji_pokok" class="form-control"
                                    value="{{ $item->gaji_pokok }}" required>
                                <span class="text-danger">*Tanpa harus menambahkan tanda titik(.) atau koma(,)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Masa Kerja</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="masa_kerja" class="form-control"
                                    value="{{ $item->masa_kerja }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Dokumen Gaji Berkala</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="file" class="form-control" value="{{ $item->file }}">
                                <span class="text-danger">{{ $item->file }}</span>
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
<!-- end edit Gaji Berkala -->