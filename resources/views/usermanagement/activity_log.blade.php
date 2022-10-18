@extends('layouts.master')
@section('title','Aktifitas User')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;height: 65vh;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table thead{background: #f7f7f7}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>

<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <label style="margin-top: 10px;">
    		                <a href="{{ route('activity-export') }}" class="btn btn-success">Print Excel</a>
                        </label>
                        <h1 class="text-primary">@yield('title')</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
                        <div class="tab-content" style="overflow-x:auto;">
                            <table class="table table-striped custom-table datatable" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>DESKRIPSI</th>
                                        <th>WAKTU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activityLog as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
