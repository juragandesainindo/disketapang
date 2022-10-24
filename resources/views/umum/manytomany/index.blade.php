@extends('layouts.adminKit')
@section('title','KIB A ( Tanah )')

@section('content')

<main class="content">
    <div class="container-fluid p-0">



        <div class="row">
            <div class="col-6 col-lg-6">
                <form action="{{ route('store.hadiah') }}" method="post">
                    @csrf
                    <input type="text" name="nama" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-primary">simpan</button>
                </form>
                <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                    <h1 class="h3">Hadiah</h1>
                </div>
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hadiah as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <form action="{{ route('store.artikel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="judul" placeholder="judul" class="form-control mb-2" required>
                    <input type="text" name="isi" placeholder="isi" class="form-control mb-2" required>
                    <select name="hadiah_id[]" multiple class="js-example-basic-single form-control mb-2" width="100%"
                        required>
                        <option value="">Pilih hadiah</option>
                        @foreach ($hadiah as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">simpan</button>
                </form>
                <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                    <h1 class="h3">Artikel</h1>
                </div>
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Hadiah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikel as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->isi }}</td>
                                <td>
                                    @foreach ($item->hadiah as $h)
                                    <span class="badge bg-primary">{{ $h->nama }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection