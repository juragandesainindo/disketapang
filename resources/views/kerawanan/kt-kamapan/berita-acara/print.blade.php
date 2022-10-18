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
        
        <h2><u>BERITA ACARA SERAH TERIMA BARANG</u><br>
        Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DKP/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/{{ $data->tanggal->isoFormat('Y') }}</h2>
        <br><br>
        
        <div class="col-md-12 text-justify" style="font-size: 14px;">
            &emsp;&emsp;&emsp;{{ $data->pendahuluan }}
        </div>
        <br>
        
        <div class="col-md-12 text-justify" style="font-size: 14px;margin-left: 35px;">
            <table>
                <tr>
                    <td>1.</td>
                    <td>&emsp;&emsp;Nama</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;: ALEK KURNIAWAN, SP. M.Si</td>
                </tr>
                <tr>
                    <td></td>
                    <td>&emsp;&emsp;Jabatan</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;: Kepala Dinas Ketahanan Pangan</td>
                </tr>
                <tr>
                    <td></td>
                    <td>&emsp;&emsp;Alamat</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;: Jl. Cut Nyak Dhien No 01 Pekanbaru</td>
                </tr>
            </table>
            <br>
            <span>Selanjutnya disebut sebagai PIHAK PERTAMA</span>
            <br><br>
            <table>
                <tr>
                    <td>2.</td>
                    <td>&emsp;&emsp;Nama</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;: <span style="text-transform: uppercase;">{{ $data->dktKelompok->ketua }}</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td>&emsp;&emsp;Jabatan</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;: Ketua Kelompok Tani {{ $data->dktKelompok->nama_dkt }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>&emsp;&emsp;Alamat</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $data->dktKelompok->alamat }}</td>
                </tr>
            </table>
        </div>
        
        <br>
        <div class="col-md-12 text-justify" style="font-size: 14px;">
            &emsp;&emsp;&emsp;{{ $data->kesimpulan }}
        </div>
        
        <div class="col-md-12 text-justify mt-4" style="font-size: 14px;">
            &emsp;&emsp;&emsp;Demikian Berita Acara Serah Terima ini dibuat untuk dipergunakan sebagaimana mestinya sesuai dengan peraturan yang berlaku.
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-8 text-left" style="font-size: 14px;"></div>
            <div class="col-md-4 text-left" style="font-size: 14px;">
                Pekanbaru, {{ $data->tanggal->isoFormat('DD MMMM Y') }}
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-4 text-left" style="font-size: 14px;">
                PIHAK KEDUA,<br>
                Ketua Kelompok Tani<br>
                {{$data->dktKelompok->nama_dkt}}
                <br><br><br><br>
                <div style="text-transform: uppercase;"><b><u>{{$data->dktKelompok->ketua}}</u></b></div>
            </div>
            <div class="col-md-4 text-left" style="font-size: 14px;"></div>
            <div class="col-md-4 text-left" style="font-size: 14px;">
                PIHAK PERTAMA,<br>
                KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU<br>
                <br><br><br>
                <div style="text-transform: uppercase;"><b><u>ALEK KURNIAWAN,SP. M.Si</u></b></div>
                <span>Pembina TK. I</span>
                <span>NIP. 19771120 199703 1 002</span>
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-12 text-left" style="font-size: 14px;">
                Lampiran&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Berita Acara Serah Terima Barang<br>
                Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;&emsp;&emsp;&emsp;/DKP/&emsp;&emsp;&emsp;&emsp;/{{ $data->tanggal->isoFormat('Y') }}<br>
                Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $data->tanggal->isoFormat('DD MMMM Y') }}
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-12 text-left" style="font-size: 14px;">
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Jenis Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach($data->beritaAcaraShow as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->jenis_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-8 text-left" style="font-size: 14px;"></div>
            <div class="col-md-4 text-left" style="font-size: 14px;">
                Pekanbaru, {{ $data->tanggal->isoFormat('DD MMMM Y') }}
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-4 text-left" style="font-size: 14px;">
                PIHAK KEDUA,<br>
                Ketua Kelompok Tani<br>
                {{$data->dktKelompok->nama_dkt}}
                <br><br><br><br>
                <div style="text-transform: uppercase;"><b><u>{{$data->dktKelompok->ketua}}</u></b></div>
            </div>
            <div class="col-md-4 text-left" style="font-size: 14px;"></div>
            <div class="col-md-4 text-left" style="font-size: 14px;">
                PIHAK PERTAMA,<br>
                KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU<br>
                <br><br><br>
                <div style="text-transform: uppercase;"><b><u>ALEK KURNIAWAN,SP. M.Si</u></b></div>
                <span>Pembina TK. I</span>
                <span>NIP. 19771120 199703 1 002</span>
            </div>
        </div>
        
        
        
    </div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>


