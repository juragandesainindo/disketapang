<div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Add Image Login</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('background-image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="ket" value="Default">
                    <input type="file" name="foto" value="{{ old('foto') }}" class="form-control" required>
                    <select name="" id="">
                        <option value="">
                            @foreach ($images as $item)
                            <img src="{{ asset('background-login/'.$item->foto) }}" alt="">
                            @endforeach
                        </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($images as $item)
<div class="modal fade" id="editImage-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Image Login</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('background-image.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="text" name="ket" value="a">
                    <input type="file" name="foto" value="{{ $item->foto }}" class="form-control">
                    <img src="{{ asset('background-login/'.$item->foto) }}" width="100" class="m-t-10">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($images as $image)
<div class="modal fade" id="deleteImage-{{ $image->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Delete Image Login</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('background-image.destroy',$image->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        <img src="{{ asset('background-login/'.$image->foto) }}" width="100" class="m-t-10">
                    </p>
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