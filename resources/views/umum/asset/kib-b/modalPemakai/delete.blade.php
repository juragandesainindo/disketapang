@foreach ($kib->assetUmumPegawai as $assetPegawai)
<div class="modal fade" id="deletePegawai-{{ $assetPegawai->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Pemakai Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('asset-umum-pegawai.destroy',$assetPegawai->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus data ini ? <br>
                    Nama : <strong>{{ $assetPegawai->pegawai->nama }}</strong> <br>
                    Jenis : <strong>{{ $assetPegawai->jenis_barang }}</strong> <br>
                    Merk/Type : <strong>{{ $assetPegawai->merk_type }}</strong> <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach