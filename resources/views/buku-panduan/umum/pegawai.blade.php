@extends('buku-panduan.app')

@section('panduan')
<style>
    img {
        position: relative;
        transform: translateX(20%);
        border: 1px solid black;
    }
</style>
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <strong>Panduan Sub Umum / Pegawai</strong>
        </div>
        <div class="card-body">
            <img src="{{ asset('assets/images/panduan/pegawai.jpg') }}" width="70%">

            <p class="card-text mt-4">
                Dalam menu <b><i>Pegawai</i></b> terdapat beberapa action, diantaranya :
            </p>
            <table class="table">
                <tr>
                    <td width="5%">1.</td>
                    <td><a href="" class="btn btn-primary btn-sm">Tambah Data</a>
                    </td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>1.</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection