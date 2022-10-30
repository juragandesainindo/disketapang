<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Riwayat Pendidikan / Pelatihan Teknis dan Pelatihan Fungsional
                </h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createPelatihanTeknis">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Pelatihan Teknis
                </button>
            </div>
            <div class="card-body">
                <table id="pelatihanTeknis" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Diklat</th>
                            <th>Angkatan/Tahun</th>
                            <th>Tempat</th>
                            <th>Panitia Penyelenggara</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pelatihanTeknis->sortByDesc('tahun') as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->nama_diklat }}</td>
                            <td>{{ $item->angkatan }} / {{ $item->tahun }}</td>
                            <td>{{ $item->tempat }}</td>
                            <td>{{ $item->panitia }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/pelatihan-teknis/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editPelatihanTeknis-{{ $item->id }}"
                                    class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#deletePelatihanTeknis-{{ $item->id }}"
                                    class="btn btn-danger btn-sm mb-1"><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="createPelatihanTeknis" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Pelatihan Teknis</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pelatihan-teknis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Diklat</label>
                        <input type="text" name="nama_diklat" class="form-control" value="{{ old('nama_diklat') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Panitia Penyelenggara</label>
                        <input type="text" name="panitia" class="form-control" value="{{ old('panitia') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pelatihan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
                    </div>
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($pegawai->pelatihanTeknis as $item)
<div class="modal fade" id="editPelatihanTeknis-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Pelatihan Teknis</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pelatihan-teknis.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Diklat</label>
                        <input type="text" name="nama_diklat" class="form-control"
                            value="{{ old('nama_diklat') ?? $item->nama_diklat }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control"
                            value="{{ old('angkatan') ?? $item->angkatan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control"
                            value="{{ old('tahun') ?? $item->tahun }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control"
                            value="{{ old('tempat') ?? $item->tempat }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Panitia Penyelenggara</label>
                        <input type="text" name="panitia" class="form-control"
                            value="{{ old('panitia') ?? $item->panitia }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pelatihan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <embed src="{{ asset('umum/pegawai/pelatihan-teknis/'.$item->foto) }}" width="100%">
                    </div>
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- delete Pangkat Start --}}
@foreach ($pegawai->pelatihanTeknis as $item)
<div class="modal fade" id="deletePelatihanTeknis-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Pelatihan Teknis</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pelatihan-teknis.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Diklat : <strong>{{ $item->nama_diklat }}</strong> <br>
                    Tahun : <strong>{{ $item->tahun }}</strong> <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"><i data-feather="save"></i> Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach