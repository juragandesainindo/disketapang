<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Data Orang Tua</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOrtu">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Data Orang Tua
                </button>
            </div>
            <div class="card-body">
                <table id="pegawaiOrtu" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ortu</th>
                            <th>Tempat & Tgl Lahir</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pegawaiOrtu->sortByDesc('tgl_lahir') as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->nama_ortu }}</td>
                            <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/ortu/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editOrtu-{{ $item->id }}"
                                    class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteOrtu-{{ $item->id }}"
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



<div class="modal fade" id="createOrtu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Data Orang Tua</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-ortu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Ortu</label>
                        <input type="text" name="nama_ortu" class="form-control" value="{{ old('nama_ortu') }}"
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
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Pilih status</option>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
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

@foreach ($pegawai->pegawaiOrtu as $item)
<div class="modal fade" id="editOrtu-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Data Orang Tua</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-ortu.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama Ortu</label>
                        <input type="text" name="nama_ortu" class="form-control"
                            value="{{ old('nama_ortu') ?? $item->nama_ortu }}" required>
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
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="{{ $item->status }}">{{ $item->status }}</option>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option>
                        </select>
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
                        <embed src="{{ asset('umum/pegawai/ortu/'.$item->foto) }}" width="100%">
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
@foreach ($pegawai->pegawaiOrtu as $item)
<div class="modal fade" id="deleteOrtu-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data Orang Tua</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-ortu.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Orang Tua : <strong>{{ $item->nama_ortu }}</strong> <br>
                    Tgl Lahir : <strong>{{ $item->tgl_lahir }}</strong> <br>
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