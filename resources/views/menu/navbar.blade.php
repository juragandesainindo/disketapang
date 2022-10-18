
<ul>
    <li class="header-icon dib"><img class="avatar-img" src="{{ asset('assets/sitangan2.png') }}" style="width:50px;"> <span class="user-avatar">
        
        
        <i class="ti-angle-down f-s-10"></i></span>
        <div class="drop-down dropdown-profile">
            <!-- <div class="dropdown-content-heading">
                <span class="text-left">Upgrade Now</span>
                <p class="trial-day">30 Days Trail</p>
            </div> -->
            <div class="dropdown-content-body">
                <ul>
                    <li><a href="#"><i class="ti-user"></i> <span>
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                            Hi, Kadis Ketapang
                        @endif
                        
                        @if(Auth::user()->role_name=='Super Admin')
                            Hi, Super Admin
                        @endif
                        
                        @if(Auth::user()->role_name=='Kabid Ketersediaan dan Kerawanan Pangan')
                            Hi, Kabid Ketersediaan dan Kerawanan Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kabid Distribusi dan Cadangan Pangan')
                            Hi, Kabid Distribusi dan Cadangan Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kabid Konsumsi dan Keamanan Pangan')
                            Hi, Kabid Konsumsi dan Keamanan Pangan
                        @endif
                        
                        @if(Auth::user()->role_name=='Kasub Bagian Umum')
                            Hi, Kasub Bagian Umum
                        @endif
                        @if(Auth::user()->role_name=='Kasub Bagian Keuangan')
                            Hi, Kasub Bagian Keuangan
                        @endif
                        
                        @if(Auth::user()->role_name=='Kasi Ketersediaan Pangan')
                            Hi, Kasi Ketersediaan Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kasi Sumber Daya Pangan')
                            Hi, Kasi Sumber Daya Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kasi Kerawanan Pangan')
                            Hi, Kasi Kerawanan Pangan
                        @endif
                        
                        @if(Auth::user()->role_name=='Kasi Distribusi Pangan')
                            Hi, Kasi Distribusi Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kasi Harga Pangan')
                            Hi, Kasi Harga Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kasi Cadangan Pangan')
                            Hi, Kasi Cadangan Pangan
                        @endif
                        
                        @if(Auth::user()->role_name=='Kasi Keamanan Pangan')
                            Hi, Kasi Keamanan Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kasi Penganekaragaman Konsumsi Pangan')
                            Hi, Kasi Penganekaragaman Konsumsi Pangan
                        @endif
                        @if(Auth::user()->role_name=='Kasi Konsumsi Pangan')
                            Hi, Kasi Konsumsi Pangan
                        @endif
                    </span></a></li>
                    <li><a href="{{ url('panduan-aplikasi') }}" target="_blank"><i class="ti-file"></i> <span>Panduan Aplikasi</span></a></li>
                    <li><a href="{{ route('change-password') }}" target="_blank"><i class="ti-lock"></i> <span>Ubah Password</span></a></li>
                    <li><a href="{{ url('logout') }}"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>
    </li>
</ul>