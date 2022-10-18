<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page in HTML with CSS Code Example</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('adminKit/auth') }}/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="box-form">
        <div class="left">
            <img src="{{ asset('assets/login-flyer.jpg') }}" alt="">

        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="right">
                {{-- <h5>Login</h5> --}}
                <img src="{{ asset('assets/logo-sitangan.png') }}" width="100%" alt="">
                <div class="inputs">
                    <input id="email" type="email" class="form-control email @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                        autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="password" type="password"
                        class="form-control form-password @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: black;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br><br>

                <br>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
    <!-- partial -->

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