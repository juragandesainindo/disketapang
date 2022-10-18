{{-- Pangkat Start --}}
<div class="modal fade" id="createPangkat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create Pangkat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Pangkat/Golongan</label>
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
                        <label>Dokumen Pangkat</label>
                        <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Pangkat End --}}