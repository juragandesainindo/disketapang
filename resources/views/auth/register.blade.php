{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="telepon" value="{{ old('telepon') }}"
                                placeholder="Enter Your Phone Number" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="role_name" id="role_name" required>
                                <option selected disabled>Pilih Akses Login</option>
                                <optgroup label="Pembina">
                                    <option value="Kadis Ketapang">Kadis Ketapang</option>
                                </optgroup>
                                <optgroup label="Administrator">
                                    <option value="Super Admin">Super Admin</option>
                                </optgroup>
                                <optgroup label="Koordinator">
                                    <option value="Kabid Ketersediaan dan Kerawanan Pangan">Kabid Ketersediaan dan
                                        Kerawanan Pangan</option>
                                    <option value="Kabid Distribusi dan Cadangan Pangan">Kabid Distribusi dan Cadangan
                                        Pangan</option>
                                    <option value="Kabid Konsumsi dan Keamanan Pangan">Kabid Konsumsi dan Keamanan
                                        Pangan</option>
                                </optgroup>
                            </select>
                            <select class="form-control" name="role_name" id="role_name" required>
                                <option selected disabled>Pilih Akses Login</option>
                                <span>Pembina</span>
                                <option disable selected>Pembina</option>
                                <option value="Pembina">Kadis Ketapang</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Super Admin">Super Admin</option>




                                <option value="Sub Bagian Umum">Sub Bagian Umum</option>
                                <option value="Sub Bagian Keuangan">Sub Bagian Keuangan</option>
                                <option value="Bidang Ketersediaan">Bidang Ketersediaan</option>
                                <option value="Bidang Kerawanan">Bidang Kerawanan</option>
                                <option value="Bidang Distribusi & Cadangan Pangan">Bidang Distribusi & Cadangan Pangan
                                </option>
                                <option value="Bidang Keamanan Pangan">Bidang Keamanan Pangan</option>
                                <option value="Bidang Penganekaragaman Konsumsi Pangan">Bidang Penganekaragaman Konsumsi
                                    Pangan</option>
                                <option value="Bidang Konsumsi Pangan">Bidang Konsumsi Pangan</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}