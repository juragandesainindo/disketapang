@extends('layouts.master')
@section('title','Halaman Dashboard')
@section('content')
<style>
.carousel-inner {
    width: 98%;
    height: 450px;
    margin: 10px auto;
    border-width: 6px;
    border-style: solid;
    border-image: linear-gradient(to right, white, orange) 1;
    box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.4);
}
</style>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('assets/images/dashboard.jpg') }}" alt="Image Dashboard" style="width:100%;">
        </div>
    </div>
</div>

@endsection