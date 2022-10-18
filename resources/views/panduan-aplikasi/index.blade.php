<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Panduan Aplikasi Sitangan</title>
  </head>
  <body>
    
    <!--<div class="container mt-5">-->
        <h4 class="text-center font-weight-bold">
            <a href="{{ url('panduan-aplikasi') }}" style="color: #FF5733; text-decoration: none;">
                <img src="{{ asset('assets/logo-sitangan.png') }}" width="200px"> PANDUAN APLIKASI SITANGAN
            </a>
        </h4>
        <div class="mx-auto">
            <nav class="navbar navbar-expand-lg navbar-light font-weight-bold" style="background-color: green;">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Sub Bagian Umum
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ asset('assets/panduan/umum/profil-pegawai.pdf') }}" target="_blank">Profil Pegawai</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/umum/sop.pdf') }}" target="_blank">SOP</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/umum/peta-jabatan.pdf') }}" target="_blank">Peta Jabatan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/umum/kendaraan.pdf') }}" target="_blank">Data Kendaraan</a>
                        </div>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Sub Bagian Keuangan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#" target="_blank">Evaluasi Renstra</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/keuangan/laporan-realisasi.pdf') }}" target="_blank">Laporan Realisasi</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/keuangan/dpa.pdf') }}" target="_blank">DPA</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/keuangan/laporan-keuangan.pdf') }}" target="_blank">Laporan Keuangan</a>
                        </div>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Bidang Ketersediaan & Kerawanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ asset('assets/panduan/kerawanan/data-prognosa.pdf') }}" target="_blank">Data Prognosa</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/kerawanan/kelompok-tani.pdf') }}" target="_blank">Data Kelompok Tani</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" target="_blank">Penerima Manfaat Kamapan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" target="_blank">SKPG Bulanan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Peta FSVA</a>
                        </div>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Bidang Distribusi & Cadangan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ asset('assets/panduan/distribusi/unit-distributor.pdf') }}" target="_blank">Unit Distributor</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ asset('assets/panduan/distribusi/harga-pangan.pdf') }}" target="_blank">Harga Pangan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" target="_blank">Pasar-Pasar</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" target="_blank">Daftar Gudang Makanan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" target="_blank">Data Cadangan Pangan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" target="_blank">Cadangan Beras Bulog</a>
                        </div>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Bidang Konsumsi & Keamanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Data Keamanan Pangan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Pengusul Sertifikasi</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Data Pangan Lokal dan Olahan</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Data Konsumsi Pangan/Kapita</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Data Kelompok Wanita Tani</a>
                        </div>
                      </li>
                      
                    </ul>
                  </div>
                </nav>
        </div>
    <!--</div>-->
    
    
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>