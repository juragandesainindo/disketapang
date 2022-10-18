@extends('layouts.adminKit')
@section('title','Edit New Kendaraan')

@section('content')
<style>
	.img-preview {
		border: 2px solid #f2f2f2;
		border-radius: 3px;
		width: 100px;
		height: 100px;
		background-color: #f2f2f2;
	}
</style>
<main class="content">
	<div class="container-fluid p-0">

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h3">@yield('title')</h1>
			<a href="{{ route('kendaraans.index') }}" class="btn btn-secondary"><i
					data-feather="arrow-left-circle"></i>&nbsp;
				Back
			</a>
		</div>

		<form action="{{ route('kendaraans.update',$kendaraan->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="card flex-fill px-2 pb-2">
						<div class="card-header">
							<strong>I. Identitas Pemilik</strong>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<div class="form-group mb-3">
										<label>Nama &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
										<input name="nama" value="{{ old('nama') ?? $kendaraan->nama }}"
											class="form-control @error('nama') is-invalid @enderror" type="text"
											autofocus>
										@error('nama')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="col-lg-6 col-md-12">
									<div class="form-group mb-3">
										<label>Alamat &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
										<textarea name="alamat" cols="30" rows="2" class="form-control @error('alamat') is-invalid                                            
                                        @enderror">{{ old('alamat') ?? $kendaraan->alamat }}</textarea>
										@error('alamat')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="card flex-fill px-2 pb-2">
								<div class="card-header">
									<strong>II. Identitas Kendaraan</strong>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group mb-3">
												<label>No Registrasi</label>
												<input type="text" name="registrasi" class="form-control @error('registrasi') is-invalid                                            
                                        @enderror" value="{{ old('registrasi') ?? $kendaraan->registrasi }}">
												@error('registrasi')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Merk</label>
												<input type="text" name="merk" class="form-control @error('merk') is-invalid                                            
                                        @enderror" value="{{ old('merk') ?? $kendaraan->merk }}">
												@error('merk')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Type</label>
												<input type="text" name="type" class="form-control @error('type') is-invalid                                            
                                        @enderror" value="{{ old('type') ?? $kendaraan->type }}">
												@error('type')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Jenis</label>
												<input type="text" name="jenis" class="form-control @error('jenis') is-invalid                                            
                                        @enderror" value="{{ old('jenis') ?? $kendaraan->jenis }}">
												@error('jenis')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Model</label>
												<input type="text" name="model" class="form-control @error('model') is-invalid                                            
                                        @enderror" value="{{ old('model') ?? $kendaraan->model }}">
												@error('model')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Tahun Pembuatan</label>
												<input type="text" name="tahun_pembuatan" class="form-control @error('tahun_pembuatan') is-invalid                                            
                                        @enderror" value="{{ old('tahun_pembuatan') ?? $kendaraan->tahun_pembuatan }}">
												@error('tahun_pembuatan')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Silinder</label>
												<input type="text" name="silinder" class="form-control @error('silinder') is-invalid                                            
                                        @enderror" value="{{ old('silinder') ?? $kendaraan->silinder }}">
												@error('silinder')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group mb-3">
												<label>No Rangka</label>
												<input type="text" name="no_rangka" class="form-control @error('no_rangka') is-invalid                                            
                                        @enderror" value="{{ old('no_rangka') ?? $kendaraan->no_rangka }}">
												@error('no_rangka')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>No Mesin</label>
												<input type="text" name="no_mesin" class="form-control @error('no_mesin') is-invalid                                            
                                        @enderror" value="{{ old('no_mesin') ?? $kendaraan->no_mesin }}">
												@error('no_mesin')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Warna</label>
												<input type="text" name="warna" class="form-control @error('warna') is-invalid                                            
                                        @enderror" value="{{ old('warna') ?? $kendaraan->warna }}">
												@error('warna')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Bahan Bakar</label>
												<input type="text" name="bahan_bakar" class="form-control @error('bahan_bakar') is-invalid                                            
                                        @enderror" value="{{ old('bahan_bakar') ?? $kendaraan->bahan_bakar }}">
												@error('bahan_bakar')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Warna TNKB</label>
												<input type="text" name="warna_tnkb" class="form-control @error('warna_tnkb') is-invalid                                            
                                        @enderror" value="{{ old('warna_tnkb') ?? $kendaraan->warna_tnkb }}">
												@error('warna_tnkb')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Berlaku</label>
												<input type="date" name="berlaku" class="form-control @error('berlaku') is-invalid                                            
                                        @enderror" value="{{ old('berlaku') ?? $kendaraan->berlaku }}">
												@error('berlaku')
												<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="card flex-fill px-2 pb-2">
								<div class="card-header">
									<strong>III. Image Kendaraan</strong>
								</div>
								<div class="card-body">
									<div class="form-group mb-3">
										<label>Gambar Depan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
										<input name="image" id="image" value="{{ old('image') ?? $kendaraan->image }}"
											class="form-control @error('image') is-invalid @enderror" type="file"
											autofocus>
										@if ($depan > 0)
										<img src="{{ asset('kendaraan/'.$depan) }}" width="100" class="mt-2" id="img">
										@endif
										<div class="mt-2">
											<img id="preview-image" class="img-preview">
										</div>

										@error('image')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group mb-3">
										<label>Gambar Samping Kiri</label>
										<input name="image_s_kiri" id="imageKiri"
											value="{{ old('image_s_kiri') ?? $kendaraan->image_s_kiri }}"
											class="form-control @error('image_s_kiri') is-invalid @enderror" type="file"
											autofocus>
										@if ($kiri > 0)
										<img src="{{ asset('kendaraan/'.$kiri) }}" width="100" class="mt-2"
											id="img-kiri">
										@endif
										<div class="mt-2">
											<img id="preview-image-kiri" class="img-preview">
										</div>
										@error('image_s_kiri')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group mb-3">
										<label>Gambar Samping Kanan</label>
										<input name="image_s_kanan" id="imageKanan"
											value="{{ old('image_s_kanan') ?? $kendaraan->image_s_kanan }}"
											cass="form-control @error('image_s_kanan') is-invalid @enderror" type="file"
											autofocus>
										@if ($kanan> 0)
										<img src="{{ asset('kendaraan/'.$kanan) }}" width="100" class="mt-2"
											id="img-kanan">
										@endif
										<div class="mt-2">
											<img id="preview-image-kanan" class="img-preview">
										</div>
										@error('image_s_kanan')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group mb-3">
										<label>Gambar Belakang</label>
										<input name="image_belakang" id="imageBelakang"
											value="{{ old('image_belakang') ?? $kendaraan->image_belakang }}"
											cass="form-control @error('image_belakang') is-invalid @enderror"
											type="file" autofocus>
										@if ($belakang> 0)
										<img src="{{ asset('kendaraan/'.$belakang) }}" width="100" class="mt-2"
											id="img-belakang">
										@endif
										<div class="mt-2">
											<img id="preview-image-belakang" class="img-preview">
										</div>
										@error('image_belakang')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group mb-3">
										<label>Gambar Dalam</label>
										<input name="image_dalam" id="imageDalam"
											value="{{ old('image_dalam') ?? $kendaraan->image_dalam }}"
											class="form-control @error('image_dalam') is-invalid @enderror" type="file"
											autofocus>
										@if ($dalam > 0)
										<img src="{{ asset('kendaraan/'.$dalam) }}" width="100" class="mt-2"
											id="img-dalam">
										@endif
										<div class="mt-2">
											<img id="preview-image-dalam" class="img-preview">
										</div>
										@error('image_dalam')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group mb-3">
										<label>Gambar Mesin</label>
										<input name="image_mesin" id="imageMesin"
											value="{{ old('image_mesin') ?? $kendaraan->image_mesin }}"
											class="form-control @error('image_mesin') is-invalid @enderror" type="file"
											autofocus>
										@if ($mesin > 0)
										<img src="{{ asset('kendaraan/'.$mesin) }}" width="100" class="mt-2"
											id="img-mesin">
										@endif
										<div class="mt-2">
											<img id="preview-image-mesin" class="img-preview">
										</div>
										@error('image_mesin')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 mt-3">
					<button type="submit" class="btn btn-primary btn-block">
						<i data-feather="save"></i>&nbsp;
						Update
					</button>
				</div>
		</form>

	</div>
</main>
@endsection

@push('js')
<script type="text/javascript">
	$(document).ready(function (e) {
        $('#preview-image').hide();
        $('#preview-image-kiri').hide();
        $('#preview-image-kanan').hide();
        $('#preview-image-belakang').hide();
        $('#preview-image-dalam').hide();
        $('#preview-image-mesin').hide();

        $('#image').change(function(){
                
            let reader = new FileReader();
        
            reader.onload = (e) => { 
				$('#img').hide();
                $('#preview-image').show();
                $('#preview-image').attr('src', e.target.result); 
            }
            
            reader.readAsDataURL(this.files[0]); 
        
        });

        $('#imageKiri').change(function(){
                
            let reader = new FileReader();
            
            reader.onload = (e) => { 
				$('#img-kiri').hide();
                $('#preview-image-kiri').show();
                $('#preview-image-kiri').attr('src', e.target.result); 
            }
            
            reader.readAsDataURL(this.files[0]); 
        
        });

        $('#imageKanan').change(function(){
        
            let reader = new FileReader();
            
            reader.onload = (e) => {
				$('#img-kanan').hide();
            $('#preview-image-kanan').show();
            $('#preview-image-kanan').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]);
        
        });

        $('#imageBelakang').change(function(){
        
            let reader = new FileReader();
            
            reader.onload = (e) => {
				$('#img-belakang').hide();
            $('#preview-image-belakang').show();
            $('#preview-image-belakang').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]);
        
        });

        $('#imageDalam').change(function(){
        
            let reader = new FileReader();
            
            reader.onload = (e) => {
				$('#img-dalam').hide();
            $('#preview-image-dalam').show();
            $('#preview-image-dalam').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]);
        
        });

        $('#imageMesin').change(function(){
        
            let reader = new FileReader();
            
            reader.onload = (e) => {
				$('#img-mesin').hide();
            $('#preview-image-mesin').show();
            $('#preview-image-mesin').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]);
        
        });
       
    });
     
</script>
@endpush