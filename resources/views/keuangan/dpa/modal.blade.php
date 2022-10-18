<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah DPA</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dpa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>Title</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>File</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="file" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal add -->


<!-- Modal edit -->
@switch($edit)
@case(1)
@foreach($dpa as $data)
<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit DPA</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dpa.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>Title</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="title" class="form-control" value="{{ $data->title }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>File</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="file" class="form-control">
                                <a href="{{ asset('keuangan/dpa/'.$data->file) }}" class="text-danger"
                                    target="_blank">{{ $data->file }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@break
@endswitch
<!-- Modal edit -->

<!-- Modal delete -->
@switch($delete)
@case(1)
@foreach($dpa as $data)
<div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Hapus DPA</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dpa.destroy',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin menghapus data <strong>{{ $data->title }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@break
@endswitch
<!-- Modal delete -->