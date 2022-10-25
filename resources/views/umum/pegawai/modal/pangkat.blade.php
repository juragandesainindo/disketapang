<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card flex-fill px-2 pb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-dark mb-0">Riwayat Kepangkatan</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPangkat">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Add Pangkat
                </button>
            </div>
            <div class="card-body">
                <table id="pangkat" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pangkat/Gol</th>
                            <th>No SK</th>
                            <th>Tgl SK</th>
                            <th>TMT Pangkat</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai->pegawaiPangkat as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->nama_pangkat }}</td>
                            <td>{{ $item->no_sk }}</td>
                            <td>{{ $item->tgl_sk }}</td>
                            <td>{{ $item->tmt_pangkat }}</td>
                            <td>
                                @if ($item->foto === Null)
                                <span class="text-secondary">Null</span>
                                @else
                                <a href="{{ asset('umum/pegawai/pangkat/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('assets/folder.png') }}" width="36" height="36"
                                        class="rounded-circle me-2" alt="{{ $item->nama_pangkat }}">
                                    @endif
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editPangkat-{{ $item->id }}"
                                    class="btn btn-info btn-sm"><i data-feather="edit"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deletePangkat-{{ $item->id }}"
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







{{-- Pangkat Start --}}
<div class="modal fade" id="createPangkat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Pangkat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pangkat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Pangkat/Golongan</label>
                        <select name="nama_pangkat" class="form-control" required>
                            <option value="">Pilih salah satu</option>
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
                    <div class="form-group mb-3">
                        <label>No SK</label>
                        <input type="text" name="no_sk" class="form-control" value="{{ old('no_sk') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tgl SK</label>
                        <input type="date" name="tgl_sk" class="form-control" value="{{ old('tgl_sk') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>TMT Pangkat</label>
                        <input type="date" name="tmt_pangkat" class="form-control" value="{{ old('tmt_pangkat') }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pangkat <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
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

{{-- Edit Pangkat Start --}}
@foreach ($pegawai->pegawaiPangkat as $item)
<div class="modal fade" id="editPangkat-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Pangkat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pangkat.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Pangkat/Golongan</label>
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
                    <div class="form-group mb-3">
                        <label>No SK</label>
                        <input type="text" name="no_sk" class="form-control" value="{{ old('no_sk') ?? $item->no_sk }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tgl SK</label>
                        <input type="date" name="tgl_sk" class="form-control"
                            value="{{ old('tgl_sk') ?? $item->tgl_sk }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>TMT Pangkat</label>
                        <input type="date" name="tmt_pangkat" class="form-control"
                            value="{{ old('tmt_pangkat') ?? $item->tmt_pangkat }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Dokumen Pangkat <span class="text-danger">( jpg, jpeg, png, pdf )</span></label>
                        <input type="file" name="foto" class="form-control mb-2"
                            value="{{ old('foto') ?? $item->foto }}">
                        <img src="{{ asset('umum/pegawai/pangkat/'.$item->foto) }}" width="100%">
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
@foreach ($pegawai->pegawaiPangkat as $item)
<div class="modal fade" id="deletePangkat-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Pangkat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pegawai-pangkat.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    Pangkat : <strong>{{ $item->nama_pangkat }}</strong> <br>
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