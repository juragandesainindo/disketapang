<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Pengalaman dalam Organisasi
                </h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOrganisasi">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Organisasi
                </button>
            </div>
            <div class="card-body">
                <table id="organisasi" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi</th>
                            <th>Kedudukan dalam Organisasi</th>
                            <th>Tempat</th>
                            <th>Nama Pimpinan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pegawaiOrganisasi->sortByDesc('id') as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->nama_organisasi }}</td>
                            <td>{{ $item->kedudukan }}</td>
                            <td>{{ $item->tempat }}</td>
                            <td>{{ $item->nama_pimpinan }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/organisasi/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editOrganisasi-{{ $item->id }}"
                                    class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteOrganisasi-{{ $item->id }}"
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



<div class="modal fade" id="createOrganisasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Organisasi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-organisasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" class="form-control"
                            value="{{ old('nama_organisasi') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kedudukan Dalam Organisasi</label>
                        <input type="text" name="kedudukan" class="form-control" value="{{ old('kedudukan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama Pimpinan</label>
                        <input type="text" name="nama_pimpinan" class="form-control" value="{{ old('nama_pimpinan') }}"
                            required>
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

@foreach ($pegawai->pegawaiOrganisasi as $item)
<div class="modal fade" id="editOrganisasi-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Organisasi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-organisasi.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" class="form-control"
                            value="{{ old('nama_organisasi') ?? $item->nama_organisasi }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kedudukan Dalam Organisasi</label>
                        <input type="text" name="kedudukan" class="form-control"
                            value="{{ old('kedudukan') ?? $item->kedudukan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control"
                            value="{{ old('tempat') ?? $item->tempat }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama Pimpinan</label>
                        <input type="text" name="nama_pimpinan" class="form-control"
                            value="{{ old('nama_pimpinan') ?? $item->nama_pimpinan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pelatihan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <embed src="{{ asset('umum/pegawai/organisasi/'.$item->foto) }}" width="100%">
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
@foreach ($pegawai->pegawaiOrganisasi as $item)
<div class="modal fade" id="deleteOrganisasi-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Organisasi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-organisasi.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Organisasi : <strong>{{ $item->nama_organisasi }}</strong> <br>
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