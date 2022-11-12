<!-- Modal 1 -->
<div class="modal fade" id="addKeteranganBA1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('asset-umum-bast.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="asset_umum_id" value="{{ $asset->id }}">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30"
                        rows="5">{{ old('keterangan') }}</textarea>
                    <input type="hidden" name="kategori" value="kategori1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="addKeteranganBA2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('asset-umum-bast.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="asset_umum_id" value="{{ $asset->id }}">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30"
                        rows="5">{{ old('keterangan') }}</textarea>
                    <input type="hidden" name="kategori" value="kategori2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>