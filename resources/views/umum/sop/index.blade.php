@extends('layouts.adminKit')
@section('title','SOP')
@section('content')

@include('umum.sop.modal')

<main class="content">
    <div class="container-fluid p-0">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Create
                </a>
            </div>
        </div>

        <div class="row">
            @forelse ($sop as $key => $item)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <embed type="application/pdf" src="{{ asset('umum/sop/' . $item->file) }}"
                        class="img-rounded img-responsive" alt="Cinque Terre"></embed>
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{$item->title}}</h5>
                        <a href="{{ asset('umum/sop/'.$item->file) }}" target="_blank" class="btn btn-sm btn-info"><i
                                data-feather="image"></i> View</a>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit-{{ $item->id }}"><i data-feather="edit"></i> Edit</a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-{{ $item->id }}"><i data-feather="trash"></i> Delete</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3 text-center text-danger">
                    Data SOP Null
                </div>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $sop->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>
</main>

@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function (e) {
            $('#preview-sop').hide();
    
            $('#sop').change(function(){
                    
                let reader = new FileReader();
            
                reader.onload = (e) => { 
                    $('#preview-sop').show();
                    $('#preview-sop').attr('src', e.target.result); 
                }
                
                reader.readAsDataURL(this.files[0]); 
            
            });

            $('#sop-edit').change(function(){
                    
                let reader = new FileReader();
            
                reader.onload = (e) => { 
                    $('#img').hide();
                    $('#preview-sop-edit').show();
                    $('#preview-sop-edit').attr('src', e.target.result); 
                }
                
                reader.readAsDataURL(this.files[0]); 
            
            });
        });
</script>
@endpush