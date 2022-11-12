@extends('layouts.adminKit')
@section('title','Tambah Pegawai')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('pegawais.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2 pb-2">
                    <div class="card-body">
                        <form action="{{ route('add-more-input.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name"
                                            class="form-control" /></td>
                                    <td><input type="text" name="addmore[0][qty]" placeholder="Enter your Qty"
                                            class="form-control" /></td>
                                    <td><input type="text" name="addmore[0][price]" placeholder="Enter your Price"
                                            class="form-control" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                            More</button></td>
                                </tr>
                            </table>


                            <button type="submit" class="btn btn-primary btn-block">
                                <i data-feather="save"></i>&nbsp;
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</main>
@endsection

@push('js')
<script type="text/javascript">
    var i = 0;
           
        $("#add").click(function(){
       
            ++i;
       
            $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });
       
        $(document).on('click', '.remove-tr', function(){  
             $(this).parents('tr').remove();
        });  
       
</script>
@endpush