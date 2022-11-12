<!-- Modal Edit -->
@foreach ($asset->assetUmumBast as $key => $bast)
<div class="modal fade" id="editKeteranganBA-{{ $bast->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Keterangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('asset-umum-bast.update',$bast->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30"
                        rows="5">{{ $bast->keterangan }}</textarea>
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