<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Riwayat Jabatan</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createJabatan">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Jabatan
                </button>
            </div>
            <div class="card-body">
                <table id="jabatan" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Eselon</th>
                            <th>TMT Jabatan</th>
                            <th>Akhir Jabatan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pegawaiJabatan as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->nama_jabatan }}</td>
                            <td>{{ $item->eselon }}</td>
                            <td>{{ $item->tmt_jabatan }}</td>
                            <td>{{ $item->akhir_jabatan }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/jabatan/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2" alt="{{ $item->nama_jabatan }}">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editJabatan-{{ $item->id }}"
                                    class="btn btn-info btn-sm"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteJabatan-{{ $item->id }}"
                                    class="btn btn-danger btn-sm"><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="createJabatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Jabatan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-jabatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" value="{{ old('nama_jabatan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Eselon</label>
                        <input type="text" name="eselon" class="form-control" value="{{ old('eselon') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>TMT Jabatan</label>
                        <input type="date" name="tmt_jabatan" class="form-control" value="{{ old('tmt_jabatan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Akhir Jabatan</label>
                        <input type="date" name="akhir_jabatan" class="form-control" value="{{ old('akhir_jabatan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Jabatan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
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

@foreach ($pegawai->pegawaiJabatan as $item)
<div class="modal fade" id="editJabatan-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Jabatan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-jabatan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control"
                            value="{{ old('nama_jabatan') ?? $item->nama_jabatan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Eselon</label>
                        <input type="text" name="eselon" class="form-control"
                            value="{{ old('eselon') ?? $item->eselon }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>TMT Jabatan</label>
                        <input type="date" name="tmt_jabatan" class="form-control"
                            value="{{ old('tmt_jabatan') ?? $item->tmt_jabatan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Akhir Jabatan</label>
                        <input type="date" name="akhir_jabatan" class="form-control"
                            value="{{ old('akhir_jabatan') ?? $item->akhir_jabatan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Jabatan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <embed src="{{ asset('umum/pegawai/jabatan/'.$item->foto) }}" width="100%">
                    </div>
                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- delete Pangkat Start --}}
@foreach ($pegawai->pegawaiJabatan as $item)
<div class="modal fade" id="deleteJabatan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Jabatan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-jabatan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Jabatan : <strong>{{ $item->nama_jabatan }}</strong> <br>
                    Eselon : <strong>{{ $item->eselon }}</strong> <br>
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