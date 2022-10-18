@extends('layouts.master')


@section('content')
    <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p> -->






<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
                        <div class="tab-content">
                            @php 
                                $sumber = 'http://ppid.jakarta.go.id/json?url=http://data.jakarta.go.id/dataset/06f19910-82c3-428f-9e13-14d848486f69/resource/a7cc5803-9993-427b-a3df-9745a233b38d/download/Lomba-bercerita-anak-TerbaikEdited.csv';
                                $konten = file_get_contents($sumber);
                                $data = json_decode($konten, true);

                            @endphp
                            <table border="1">
                              <tr>
                               <th>No</th>
                               <th>Tahun</th>
                               <th>Jenis Lomba</th>
                               <th>Juara</th>
                               <th>Nama</th>
                               <th>Sekolah</th>
                               <th>ID</th> 
                              </tr>

                              @foreach($data as $a)
                                <tr>
                                    <td>{{ $a->tahun }}</td>
                                </tr>
                              @endforeach
                             </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection