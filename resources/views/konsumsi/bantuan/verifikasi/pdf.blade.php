<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title></title>
	<style type="text/css">
	body{
	    font-family: Arial, sans-serif;
	}
	.container{
	    width: 768px;
	}
	.kop-surat{
	    display: flex;
	}
	.kop-surat .logo{
	    width: 20%;
	}
	.kop-surat .head{
	    font-size: 24px;
	    text-align: center;
	    width: 100%;
	}
	.kop-surat .head h8{
	    font-size: 16px;
	    text-align: center;
	}
	.kop-surat .head h5{
	    font-size: 18px;
	    text-align: center;
	    font-weight: bold;
	    color: black;
	    margin-top: -30px;
	}
	.line{
	    width: 100%;
	    border-top: 3px solid black;
	}
	h2{
	    font-size: 14px;
	    font-weight: bold;
	    text-align: center;
	    margin-top: 15px;
	}
	.pendahuluan{
	    display: flex;
	}
	.pendahuluan h3, .isi h3{
	    font-size: 14px;
	}
	.pendahuluan .nomor{
	    width: 30px;
	}
	.isi{
	    display: flex;
	}
	.isi .nomor{
	    width: 30px;
	}
	h1{
	    font-weight: 900;
	    font-size: 36px;
	}
	</style>
</head>
<body>
    
    
    <div class="container">
        <div class="kop-surat">
            <div class="logo">
                <img src="{{ asset('assets/logopku.png') }}" width="83px">
            </div>
            <div class="head">
                <strong>PEMERINTAH KOTA PEKANBARU</strong>
                <h1>DINAS KETAHANAN PANGAN</h1>
                <h6>Alamat : Jl. Cut Nyak Dhien No. 1 Pekanbaru Telp. (0761) 40516</h6>
            </div>
            
        </div>
        <div class="line"></div>
        
        <h2>BERITA ACARA CPCL</h2>
        
        <div class="pendahuluan">
            <div class="nomor">
                <h3>I.</h3>
            </div>
            <div class="ket">
                <h3>PENDAHULUAN</h3>
            </div>
        </div>
        
        <div class="pendahuluan-isi">
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3" style="margin-left: 32px;">A. Umum/Latar Belakang</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">{{ $verifikasi->latar_belakang }}</div>
            </div>
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3" style="margin-left: 32px;">B. Landasan Hukum</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">{{ $verifikasi->landasan_hukum }}</div>
            </div>
            <div class="row mb-4" style="font-size: 14px;">
                <div class="col-md-3" style="margin-left: 32px;">C. Maksud dan Tujuan</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">{{ $verifikasi->maksud }}</div>
            </div>
        </div>
        
        <div class="isi">
            <div class="nomor">
                <h3>II.</h3>
            </div>
            <div class="ket">
                <h3>ISI</h3>
            </div>
        </div>
        
        <div class="bagian-isi">
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-4" style="margin-left: 32px;">A. Kegiatan yang dilaksanakan</div>
                <div class="col-md-0">:</div>
                <div class="col-md-7 text-justify">{{ $verifikasi->kegiatan }}</div>
            </div>
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-4" style="margin-left: 32px;">B. Hasil yang dicapai</div>
                <div class="col-md-0">:</div>
                <div class="col-md-7 text-justify">{{ $verifikasi->hasil }}</div>
            </div>
        </div>
        
        <div class="isi mt-4">
            <div class="nomor">
                <h3>III.</h3>
            </div>
            <div class="ket">
                <h3>PENUTUP</h3>
            </div>
        </div>
        
        <div class="bagian-isi">
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3" style="margin-left: 32px;">A. Kesimpulan</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">{{ $verifikasi->kesimpulan }}</div>
            </div>
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3" style="margin-left: 32px;">B. Saran</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">{{ $verifikasi->saran }}</div>
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-6"></div>
            <div class="col-md-6 text-center" style="font-size: 14px;">
                <span>Pekanbaru, {{ \Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}</span><br>
                <span>Bidang Ketersediaan dan Kerawanan Pangan</span>
                <div class="lines" style="margin-top: 80px;border-bottom: 1px solid black;"></div>
            </div>
        </div>
        
        <div class="mengetahui text-center mt-5" style="font-size: 14px;">
            <span>Mengetahui:</span>
            <div class="row">
                <div class="col-md-4">
                    <span>Ketua Kelompok Tani<br>{{ $verifikasi->KwtKelompok->nama_kwt }}</span><br><br><br>
                    <span style="text-transform: uppercase;"><b><u>{{ $verifikasi->KwtKelompok->ketua }}</u></b></span>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <span>Penyuluh Pertanian<br>Kelurahan Maharatu</span><br><br><br>
                    <span style="text-transform: uppercase;"><b><u>{{ $verifikasi->KwtKelompok->ppl }}</u></b></span>
                </div>
            </div>
        </div>
        
        
        
        
        
        
    </div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>


