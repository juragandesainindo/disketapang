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
	</style>
</head>
<body>
    
    
    <div class="container">
        <div class="kop-surat">
            <div class="logo">
                <img src="{{ asset('assets/logopku.png') }}" width="83px">
            </div>
            <div class="head">
                <strong>PEMERINTAH KOTA PEKANBARU</strong><br>
                <strong>SEKRETARIAT DAERAH</strong><br>
                <span>PERANGKAT DAERAH</span>
                <h6>Jalan Jenderal Sudirman No. 464 Telp. (0761) 31543 - 38765</h6><br>
                <h5>PEKANBARU - 28126</h5>
            </div>
            
        </div>
        <div class="line"></div>
        
        <h2>KEPUTUSAN<br> KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU<br> Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DKP/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/{{ date('Y') }}</h2>
        <h2>TENTANG</h2>
        <h2 class="mb-5">PENETAPAN PENERIMA MANFAAT KEGIATAN KAWASAN RUMAH PANGAN<br> LESTARI TAHUN {{ date('Y') }}</h2>
        
        <div class="pendahuluan-isi">
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3">Menimbang</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    a. Bahwa untuk kelancaran pelaksanaan kegiatan Pengelolaan Pemanfaatan Perkarangan untuk Pengembangan Pangan/Peran Perempuan Dalam Ketahanan Pangan tahun  2020 di   Kota Pekanbaru  perlu  ditunjuk  Kelompok  Wanita  Tani<br>
                    b. bahwa berdasarkan pertimbangan sebagaimana tersebut di atas perlu menetapkan Keputusan Kepala Dinas Ketahanan Pangan Kota Pekanbaru
                </div>
                
            </div>
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3">Mengingat</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    1. Undang-Undang Republik lndonesia Nomor 18 Tahun 2012 tentang Pangan<br>
                    2. Peraturan   Presiden   No   22   Tahun   2009   tentang   Kebijakan   Percepatan PenganekaragamanKonsumsi Pangan Berbasis Sumber Daya Lokal.<br>

                    3. lnstruksi  Presiden Republik Indonesia Nomor 8 Tahun  1999   tentang Gerakan Nasional Penanggulangan Masalah Pangan dan Gizi.<br>
                    
                    4. Peraturan Menteri Pertanian No 43/Permentan/OT.140/101 2009 tentang Gerakan Percepatan Penganekaragaman Konsumsi Pangan Berbasis Sumberdaya Lokal.<br>
                    
                    5. Peraturan Walikota Pekanbaru No 101 Tahun 2016 tentang Kedudukan,  Susunan Organisasi, Tugas dan Fungsi serta Tata  Kerja Dinas Ketahanan Pangan Kota Pekanbaru.<br>
                    
                    6. Keputusan  Walikota  Pekanbaru  Nomor  415  Tahun  2020  tentang  Perubahan Kedelapan atas Keputusan Walikota Pekanbaru Nomor 9 tahun 2020 tentang Penunjukan  Pengguna  Anggaran/Pengguna Barang,  Bendahara  Pengeluaran Penerimaan dan Pengurus Barang di Lingkungan Pemerintah Kota Pekanbaru.

                </div>
            </div>
            <div class="row mb-4" style="font-size: 14px;">
                <div class="col-md-3">Memperhatikan</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    1.       Dokumen  Pelaksanaan  Anggaran     Satker  Dinas  Ketahanan  Pangan    Kota Pekanbaru Nomor 1.02.03.1.02.03.01.23.002.5.2    Tanggal 17 Juli 2020<br>

                    2.   Surat  Keputusan  Kepala  Dinas  Ketahanan  Pangan  Kota  Pekanbaru  Nomor 900/DKP/436 tanggal   27 Agustus 2020 tentang Perubahan Ketiga penetapan
                    Nama-nama Pejabat Pelaksana Teknis  Kegiatan   Organisasi Perangkat Daerah dan Stat Kegiatan Dinas Ketahanan Pangan Kota Pekanbaru Tahun Anggaran 2020
                </div>
            </div>
        </div>
        
        <div class="col-md-12 text-center"><strong>MEMUTUSKAN</strong></div>
        
        <div class="bagian-isi">
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-12">MENETAPKAN</div>
                <div class="col-md-3">Kesatu</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    Menetapkan  Penerima  Manfaat  Kawasan Rumah  Pangan Lestari Tahun  2020 pada  Dinas  Ketahanan Pangan  Kata Pekanbaru Tahun Anggaran  2020, yang selanjutnya disebut Penerima Manfaat sebagaimana tercantum dalam Lampiran yang merupakan bagian tidak terpisahkan dari Keputusan ini.
                </div>
                <div class="col-md-3">Kedua</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    Menetapkan  Penerima  Manfaat  Kawasan Rumah  Pangan Lestari Tahun  2020 pada  Dinas  Ketahanan Pangan  Kata Pekanbaru Tahun Anggaran  2020, yang selanjutnya disebut Penerima Manfaat sebagaimana tercantum dalam Lampiran yang merupakan bagian tidak terpisahkan dari Keputusan ini.
                </div>
                <div class="col-md-3">Ketiga</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    Menetapkan  Penerima  Manfaat  Kawasan Rumah  Pangan Lestari Tahun  2020 pada  Dinas  Ketahanan Pangan  Kata Pekanbaru Tahun Anggaran  2020, yang selanjutnya disebut Penerima Manfaat sebagaimana tercantum dalam Lampiran yang merupakan bagian tidak terpisahkan dari Keputusan ini.
                </div>
                <div class="col-md-3">Keempat</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    Menetapkan  Penerima  Manfaat  Kawasan Rumah  Pangan Lestari Tahun  2020 pada  Dinas  Ketahanan Pangan  Kata Pekanbaru Tahun Anggaran  2020, yang selanjutnya disebut Penerima Manfaat sebagaimana tercantum dalam Lampiran yang merupakan bagian tidak terpisahkan dari Keputusan ini.
                </div>
            </div>
        </div>
        
        
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-6"></div>
            <div class="col-md-5 text-left" style="font-size: 14px;">
                <span>Ditetapkan di PEKANBARU<br>Pada tanggal September 2020</span><br>
                <span>KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU</span><br><br><br><br>
                <strong><u>ALEX KURNIAWAN</u></strong><br>
                <span>Pembina</span><br>
                <span>NIP. 19771120 199703 002</span>
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-12 text-left" style="font-size: 14px;">
                <span><b>Tembusan</b> : Disampaikan kepada</span><br>
                <span>1. Yth. Walikota Pekanbaru</span><br>
                <span>2. Yth. Kepala Dinas Ketahanan Pangan Provinsi Riau</span><br>
                <span>3. Yang bersangkutan</span>
            </div>
        </div>
        
        <div class="bagian-isi mt-5">
            <div class="row mb-2" style="font-size: 14px;">
                <div class="col-md-3">Lampiran</div>
                <div class="col-md-0">:</div>
                <div class="col-md-8 text-justify">
                    Surat Keputusan  Kepala Dinas Ketahanan  Pangan  Kota Pekanbaru<br>
                    Nomor &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DKP/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/{{ date('Y') }}<br>
                    Tanggal &nbsp;&nbsp;: {{ \Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}
                </div>
            </div>
        </div>
        
        <div class="row" style="black;margin-top: 30px;">
            <div class="col-md-12 text-center" style="font-size: 14px;">
                <span><b>DAFTAR NAMA-NAMA KELOMPOK TANI<br> PENERIMA MANFAAT<br> KEGIATAN KAWASAN RUMAH PANGAN LESTARI TAHUN</b></span>
            </div>
        </div>
        
        <table class="table table-bordered mt-3" style="font-size:14px;">
            <thead class="text-center">
                <tr>
                    <th>NO</th>
                    <th>NAMA KELOMPOK</th>
                    <th>NAMA KETUA</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->skShow as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->dktKelompok->nama_dkt }}</td>
                    <td>{{ $item->dktKelompok->ketua }}</td>
                    <td>{{ $item->dktKelompok->alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="row" style="black;margin-top: 40px;">
            <div class="col-md-6"></div>
            <div class="col-md-5 text-left" style="font-size: 14px;">
                <span>KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU</span><br><br><br><br>
                <strong><u>ALEX KURNIAWAN</u></strong><br>
                <span>Pembina</span><br>
                <span>NIP. 19771120 199703 002</span>
            </div>
        </div>
        
    </div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>


