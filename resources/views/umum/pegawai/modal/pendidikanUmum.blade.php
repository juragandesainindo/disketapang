<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Riwayat Pendidikan Umum</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createPendidikanUmum">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Pendidikan Umum
                </button>
            </div>
            <div class="card-body">
                <table id="pendidikanUmum" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenjang Pendidikan</th>
                            <th>Jurusan</th>
                            <th>Nama Sekolah</th>
                            <th>Tahun Lulus</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pendidikanUmum->sortByDesc('tahun_lulus') as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->jenjang_pendidikan }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->nama_sekolah }}</td>
                            <td>{{ $item->tahun_lulus }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/pendidikan-umum/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editPendidikanUmum-{{ $item->id }}"
                                    class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#deletePendidikanUmum-{{ $item->id }}"
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



<div class="modal fade" id="createPendidikanUmum" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Pendidikan Umum</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pendidikan-umum.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Jenjang Pendidikan</label>
                        <select name="jenjang_pendidikan" class="form-control" required>
                            <option value="">Pilih jenjang pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="Diploma">Diploma</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pendidikan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
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

@foreach ($pegawai->pendidikanUmum as $item)
<div class="modal fade" id="editPendidikanUmum-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Pendidikan Umum</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pendidikan-umum.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Jenjang Pendidikan</label>
                        <select name="jenjang_pendidikan" class="form-control" required>
                            <option value="{{ $item->jenjang_pendidikan }}">{{ $item->jenjang_pendidikan }}</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="Diploma">Diploma</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control"
                            value="{{ old('jurusan') ?? $item->jurusan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control"
                            value="{{ old('nama_sekolah') ?? $item->nama_sekolah }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-control"
                            value="{{ old('tahun_lulus') ?? $item->tahun_lulus }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pendidikan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <embed src="{{ asset('umum/pegawai/pendidikan-umum/'.$item->foto) }}" width="100%">
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
@foreach ($pegawai->pendidikanUmum as $item)
<div class="modal fade" id="deletePendidikanUmum-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Pendidikan Umum</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pendidikan-umum.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Jenjang Pendidikan : <strong>{{ $item->jenjang_pendidikan }}</strong> <br>
                    Sekolah : <strong>{{ $item->nama_sekolah }}</strong> <br>
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