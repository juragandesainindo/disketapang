<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('adminKit') }}/img/icons/icon-48x48.png" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | Login Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

    <link href="{{ asset('adminKit') }}/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to right, #EC9F05, #FF4E00);
            overflow: hidden;
        }

        .login-page {
            background: white;
            width: 930px;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .flyer {
            width: 439px;
            height: 549px;
            object-fit: cover;
        }

        .logo-sitangan {
            width: 80%;
            text-align: center;
            display: block;
            margin: 0 auto 30px auto;

        }

        @media (max-width: 991.98px) {
            body {
                overflow: auto;
            }

            .login-page {
                margin-top: 80px;
                width: 500px;
                /* padding: 100px 0; */
            }

            .flyer {
                width: 100%;
                height: 100%;
            }
        }

        @media (max-width: 575.98px) {
            body {
                overflow: auto;
            }

            .login-page {
                margin-top: 120px;
                width: 90%;
            }
        }
    </style>
</head>

<body>

    @include('sweetalert::alert')

    <div class="login">
        <div class="container">
            <div class="login-page">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <img src="{{ asset('assets/login-flyer.jpg') }}" class="flyer">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('assets/logo-sitangan.png') }}" class="logo-sitangan">

                                @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Whoops!</strong> Sepertinya ada masalah.<br> Silahkan Cek Kembali Email dan
                                    Password Anda
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password"
                                            class="form-control form-password @error('password') is-invalid @enderror"
                                            autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="checkbox mb-5 d-flex justify-content-between">
                                        <label>
                                            <input type="checkbox" class="form-checkbox"> Show Password
                                        </label>
                                        <label class="pull-right">
                                            <input type="checkbox" id="remember" name="remember"> Remember Me
                                        </label>
                                    </div>


                                    <button type="submit" class="btn btn-primary px-5"><i
                                            data-feather="log-in"></i>&nbsp;
                                        Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('adminKit') }}/vendor/jquery/jquery.mask.min.js"></script>
    <script src="{{ asset('adminKit') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('adminKit') }}/js/app.js"></script>

    <script src="{{ asset('assets/show-password/jquery-3.6.0.min.js') }}"></script>
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
</body>

</html>




{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Disketapang | Login</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/simdahs.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/show-password/style.css') }}">
    <style>
        .login-form {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .alert-danger {
            background-color: red;
        }

        .unix-login {
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
            padding: 10px;
        }

        .background {
            width: 100%;
            height: 100vh;
        }

        @media (max-width: 576px) {
            .background {
                height: 100%;
            }
        }
    </style>

</head>

<body>

    <div class="unix-login">
        <div class="row">
            <div class="col-lg-8 col-sm-6">
                <img src="{{ asset('assets/images/login2.jpg') }}" class="background">
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="{{ route('panduan.pegawai') }}" class="btn btn-primary">Buku Panduan</a>










                <div class="login-content">
                    <div class="login-form">
                        <!-- <h4 style="margin-bottom: -20px;"><span><img src="" width="300px"></span></h4> -->
                        @if (count($errors) > 0)
                        <div class="alert alert-danger" style="color:white;">
                            <strong>Whoops!</strong> Sepertinya ada masalah.<br> Silahkan Cek Kembali Email dan
                            Password Anda
                            <!--<ul>-->
                            <!--   @foreach ($errors->all() as $error)-->
                            <!--     <li>{{ $error }}</li>-->
                            <!--   @endforeach-->
                            <!--</ul>-->
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control email @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-password @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="form-checkbox"> Show Password
                                    </label>
                                    <label class="pull-right">
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: black;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/show-password/jquery-3.6.0.min.js') }}"></script>
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

</body>

</html> --}}