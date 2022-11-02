@extends('layouts.adminKit')
@section('title','Edit User')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('data-user.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <form action="{{ route('data-user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-header">
                            <h4>Detail User</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid
                                                                                    @enderror"
                                    value="{{ old('name') ?? $user->name }}" autofocus>
                                @error('name')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>HP</label>
                                <input type="text" name="telepon" class="form-control hp @error('telepon') is-invalid
                                                                                    @enderror"
                                    value="{{ old('telepon') ?? $user->telepon }}" autofocus>
                                @error('telepon')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Role Name</label>
                                <select name="role_name" class="form-control js-example-basic-single @error('role_name') is-invalid                                            
                                        @enderror" width="100%">
                                    <option value="{{ $user->role_name }}">{{ $user->role_name }}</option>
                                    <optgroup label="Pembina">
                                        <option value="Kadis">Kadis</option>
                                    </optgroup>
                                    <optgroup label="Administrator">
                                        <option value="Super Admin">Super Admin</option>
                                    </optgroup>
                                    <optgroup label="Koordinator">
                                        <option value="Kabid Ketersediaan dan Kerawanan Pangan">Kabid
                                            Ketersediaan dan Kerawanan Pangan</option>
                                        <option value="Kabid Distribusi dan Cadangan Pangan">Kabid Distribusi
                                            dan Cadangan Pangan</option>
                                        <option value="Kabid Konsumsi dan Keamanan Pangan">Kabid Konsumsi dan
                                            Keamanan Pangan</option>
                                    </optgroup>
                                    <optgroup label="Sekretariat">
                                        <option value="Kasub Umum">Kasub Umum</option>
                                        <option value="Kasub Keuangan">Kasub Keuangan</option>
                                    </optgroup>
                                    <optgroup label="Bidang Ketersediaan dan Kerawanan Pangan">
                                        <option value="Kasi Ketersediaan Pangan">Kasi Ketersediaan Pangan
                                        </option>
                                        <option value="Kasi Sumber Daya Pangan">Kasi Sumber Daya Pangan</option>
                                        <option value="Kasi Kerawanan Pangan">Kasi Kerawanan Pangan</option>
                                    </optgroup>
                                    <optgroup label="Bidang Distribusi dan Cadangan Pangan">
                                        <option value="Kasi Distribusi Pangan">Kasi Distribusi Pangan
                                        </option>
                                        <option value="Kasi Harga Pangan">Kasi Harga Pangan</option>
                                        <option value="Kasi Cadangan Pangan">Kasi Cadangan Pangan</option>
                                    </optgroup>
                                    <optgroup label="Bidang Konsumsi dan Keamanan Pangan">
                                        <option value="Kasi Keamanan Pangan">Kasi Keamanan Pangan
                                        </option>
                                        <option value="Kasi Penganekaragaman Konsumsi Pangan">Kasi
                                            Penganekaragaman Konsumsi Pangan</option>
                                        <option value="Kasi Konsumsi Pangan">Kasi Konsumsi Pangan</option>
                                    </optgroup>
                                </select>
                                @error('role_name')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status"
                                    class="form-control @error('status') is-invalid                                            
                                                                                                                                                @enderror">
                                    <option value="{{ $user->status }}">
                                        @if ($user->status === 1)
                                        Active
                                        @else
                                        Deactive
                                        @endif
                                    </option>
                                    <option value="0">Deactive</option>
                                    <option value="1">Active</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid                                                                                                                        @enderror"
                                    value="{{ old('email') ?? $user->email }}" autofocus>
                                @error('email')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i data-feather="save"></i>&nbsp;
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-6">
                <form action="{{ route('data-user.changePassword',$user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-header">
                            <h4>Ubah Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control form-password @error('password') is-invalid                                                                                                                        @enderror"
                                    value="{{ old('password') }}" autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control form-password @error('password_confirmation') is-invalid                                                                                                                        @enderror"
                                    value="{{ old('password_confirmation') }}" autocomplete="new-password">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input form-checkbox" type="checkbox"
                                        id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Show password
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i data-feather="save"></i>&nbsp;
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function(){       
                            $('.form-checkbox').click(function(){
                                if($(this).is(':checked')){
                                    $('.form-password').attr('type','text');
                                }else{
                                    $('.form-password').attr('type','password');
                                }
                            });
                        });
</script>
@endpush