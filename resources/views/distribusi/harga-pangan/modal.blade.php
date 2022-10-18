<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Tambah Harga Pangan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('harga-pangan-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>Keterangan</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="keterangan" class="form-control"
                                    value="{{ old('keterangan') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>File Excel</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="file" value="{{ old('file') }}" required>
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
@foreach($data as $item)
<div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Harga Pangan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('harga-pangan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>Keterangan</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="keterangan" class="form-control"
                                    value="{{ $item->keterangan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>File Excel</strong>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="file" value="{{ $item->file }}">
                                <span class="text-danger">{{ $item->file }}</span>
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

<!-- Modal delete -->
@switch($delete)
@case(1)
@foreach($data as $item)
<div class="modal fade" id="delete-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Hapus Harga Pangan</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('harga-pangan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin menghapus data <strong>{{ $item->keterangan }}</strong>?
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








<!-- @if(Auth::user()->role_name=='Kadis Ketapang')
@else
<div class="col-lg-8">
    <div class="card alert">
        <form action="{{ route('harga-pangan-search') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="date" class="form-control" placeholder="From Tahun" id="from" name="from" required>
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" placeholder="To Tahun" id="to" name="to" required>
                </div>
                <button type="submit" class="btn btn-primary" name="search">Search</button>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-10">
    <div class="card alert">
        <form action="{{ route('harga-pangan-search') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <input type="date" class="form-control" placeholder="From Tahun" id="from" name="from" required>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" placeholder="To Tahun" id="to" name="to" required>
                </div>
                <div class="col-md-3">
                    <select name="nama_pasar" class="form-control" id="nama_pasar" name="nama_pasar" required>
                        <option disable selected>Pilih salah satu</option>
                        <option value="Pasar Lima Puluh">Pasar Lima Puluh</option>
                        <option value="Pasar Cik Puan">Pasar Cik Puan</option>
                        <option value="Pasar Kodim">Pasar Kodim</option>
                        <option value="Pasar Palapa">Pasar Palapa</option>
                        <option value="Pasar Sukaramai">Pasar Sukaramai</option>
                        <option value="Pasar Arengka">Pasar Arengka</option>
                        <option value="Pasar Sail">Pasar Sail</option>
                        <option value="Pasar Simpang Baru">Pasar Simpang Baru</option>
                        <option value="Pasar Rumbai">Pasar Rumbai</option>
                        <option value="Pasar Bawah">Pasar Bawah</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info" name="exportExcel">ExportExcel</button>
            </div>
        </form>
    </div>
</div>
@endif -->