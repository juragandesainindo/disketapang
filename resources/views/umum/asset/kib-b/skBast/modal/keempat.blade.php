<div class="modal fade" id="addKeempat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan Keempat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('preview-sk-asset-umum-bast.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30"
                        rows="5">{{ old('keterangan') }}</textarea>
                    <input type="hidden" name="kategori" value="Keempat">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($skPreview as $item)
<div class="modal fade" id="editKeempat-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan Keempat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('preview-sk-asset-umum-bast.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30"
                        rows="5">{{ old('keterangan') ?? $item->keterangan }}</textarea>
                    <input type="hidden" name="kategori" value="Keempat">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@foreach ($skPreview as $item)
<div class="modal fade" id="deleteKeempat-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Keterangan Keempat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('preview-sk-asset-umum-bast.destroy',$item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini? <br>
                    <strong>{{ $item->keterangan }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach