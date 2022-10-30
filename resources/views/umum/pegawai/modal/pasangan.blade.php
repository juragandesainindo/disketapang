<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Data Suami / Istri</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPasangan">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Data Pasangan
                </button>
            </div>
            <div class="card-body">
                <table id="pegawaiPasangan" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasangan</th>
                            <th>Tempat & Tgl Lahir</th>
                            <th>Tgl Nikah</th>
                            <th>Pekerjaan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pegawaiPasangan->sortByDesc('tgl_nikah') as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->nama_pasangan }}</td>
                            <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</td>
                            <td>{{ $item->tgl_nikah }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/pasangan/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editPasangan-{{ $item->id }}"
                                    class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deletePasangan-{{ $item->id }}"
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



<div class="modal fade" id="createPasangan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Data Pasangan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pasangan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Pasangan</label>
                        <input type="text" name="nama_pasangan" class="form-control" value="{{ old('nama_pasangan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tgl Nikah</label>
                        <input type="date" name="tgl_nikah" class="form-control" value="{{ old('tgl_nikah') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}"
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

@foreach ($pegawai->pegawaiPasangan as $item)
<div class="modal fade" id="editPasangan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Data Pasangan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pasangan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Pasangan</label>
                        <input type="text" name="nama_pasangan" class="form-control"
                            value="{{ old('nama_pasangan') ?? $item->nama_pasangan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control"
                            value="{{ old('tempat_lahir') ?? $item->tempat_lahir }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control"
                            value="{{ old('tgl_lahir') ?? $item->tgl_lahir }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tgl Nikah</label>
                        <input type="date" name="tgl_nikah" class="form-control"
                            value="{{ old('tgl_nikah') ?? $item->tgl_nikah }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control"
                            value="{{ old('pekerjaan') ?? $item->pekerjaan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pelatihan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <embed src="{{ asset('umum/pegawai/pasangan/'.$item->foto) }}" width="100%">
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
@foreach ($pegawai->pegawaiPasangan as $item)
<div class="modal fade" id="deletePasangan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data Pasangan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pasangan.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Pasangan : <strong>{{ $item->nama_pasangan }}</strong> <br>
                    Tgl Nikah : <strong>{{ $item->tgl_nikah }}</strong> <br>
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