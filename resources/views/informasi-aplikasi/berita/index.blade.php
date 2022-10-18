@extends('informasi-aplikasi.layout.master')
@section('title','Kumpulan Berita')
@section('content')
    
    
    <div class="card mb-3">
        <img src="{{ asset('assets/images/dashboard.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Halaman Dashboard</h5>
            <p class="card-text">Ini merupakan image pada halaman dashboard</p>
            <a href="{{ route('image-dashboard') }}" class="btn btn-warning">Edit Gambar</a>
        </div>
    </div>


@endsection
    
    
    
    
    
    
    