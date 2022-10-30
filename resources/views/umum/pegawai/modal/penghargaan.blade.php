<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Riwayat Penghargaan / Tanda Jasa</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createpegawaiPenghargaan">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Penghargaan
                </button>
            </div>
            <div class="card-body">
                <table id="pegawaiPenghargaan" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penghargaan</th>
                            <th>Tahun</th>
                            <th>Asal Perolehan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pegawaiPenghargaan->sortByDesc('tahun') as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->penghargaan }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->asal_perolehan }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/penghargaan/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#editpegawaiPenghargaan-{{ $item->id }}"
                                    class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#deletepegawaiPenghargaan-{{ $item->id }}"
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



<div class="modal fade" id="createpegawaiPenghargaan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Penghargaan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Penghargaan</label>
                        <input type="text" name="penghargaan" class="form-control" value="{{ old('penghargaan') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Asal Perolehan</label>
                        <input type="text" name="asal_perolehan" class="form-control"
                            value="{{ old('asal_perolehan') }}" required>
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

@foreach ($pegawai->pegawaiPenghargaan as $item)
<div class="modal fade" id="editpegawaiPenghargaan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Penghargaan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-penghargaan.update',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>penghargaan</label>
                        <input type="text" name="penghargaan" class="form-control"
                            value="{{ old('penghargaan') ?? $item->penghargaan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control"
                            value="{{ old('tahun') ?? $item->tahun }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Asal Perolehan</label>
                        <input type="text" name="asal_perolehan" class="form-control"
                            value="{{ old('asal_perolehan') ?? $item->asal_perolehan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pendidikan <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <embed src="{{ asset('umum/pegawai/penghargaan/'.$item->foto) }}" width="100%">
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
@foreach ($pegawai->pegawaiPenghargaan as $item)
<div class="modal fade" id="deletepegawaiPenghargaan-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Penghargaan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-penghargaan.destroy',$item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Penghargaan : <strong>{{ $item->penghargaan }}</strong> <br>
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