<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN | AKAR-ILMU</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('qq/js/jquery.min.js') }}"></script>
    <script src="{{ asset('qq/js/popper.js') }}"></script>
    <script src="{{ asset('qq/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('qq/js/main.js') }}"></script>
    <script src="{{ asset('qq/js/multiselect-dropdown.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('qq/css/style.css') }}">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/multiselect-dropdown.js') }}"></script>
    <style>
        .multiselect-dropdown {
            width: 100% !important;
        }
    </style>
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
<div class="row mx-0 auth-wrapper">
    <!--remove bg-->
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="d-none d-sm-flex col-sm-6 col-lg-8 align-items-center p-5">
        <div class="align-items-start d-lg-flex flex-column offset-lg-2 text-white">
            <img src="" class="mb-3">
            <h1 classname="d-flex">Hi 👋 Selamat Datang <br> di Akar-Ilmu</h1>
            <p>“The more we value things, the less we value ourselves.”</p>
        </div>
    </div>

    <div class="d-flex justify-content-center col-sm-6 col-lg-4 align-items-center px-5 bg-white mx-auto">
        <div class="form-wrapper">
            <div class="d-flex flex-column">
                <div class="mb-4">

                    <h3 class="font-medium mb-1">Sign In </h3>
                    <p class="mb-2">Please sign in to your account.</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-10">
                        <div class="form-group">
                            <label for="mail" class="">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3 border-0">
                            {{ __('Login') }}
                        </button>
                        <div style="text-align: center; margin-top:16px">
                            <p>Belum punya akun?
                                <a style="color: blue" class="nav-link" href="{{ route('register') }}">{{ __('Register')
                                    }}</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>    
</body>
</html>