<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTER | AKAR-ILMU</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
            <div class="d-lg-flex flex-column text-white">
                <img src="" class="mb-3">
                <h1 style="text-align: left; font-weight: bolder; color: white;">Hi 👋 Selamat Datang <br> di AKAR-ILMU</h1>
                <p style="width: 60%">Akar Ilmu adalah sebuah aplikasi tryout berbasis web yang dirancang untuk membantu siswa dan siswi dalam mempersiapkan diri menghadapi ujian dengan lebih baik. Aplikasi ini menawarkan berbagai fitur dan fasilitas yang dapat membantu siswa dan siswi meningkatkan kemampuan dan pengetahuan mereka.</p>
            </div>
        </div>

        <div class="d-flex justify-content-center col-sm-6 col-lg-4 align-items-center bg-white">
            <div style="width: 300px" class="form-wrapper">
                    <div class="mb-4">
                        <h1 style="font-weight: bolder; font-size: 42px" class="font-bolder mb-0">Register</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-10">
                            <div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i><label for="mail" class="">Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>

                            <div class="mb-10">
                                <div class="form-group">
                                    <i class="fa fa-envelope" aria-hidden="true"></i><label for="mail" class="">Email</label>
                                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>

                                        <div class="mb-10">
                                            <div class="form-group">
                                            <i class="fa fa-address-card" aria-hidden="true"></i><label for="mail" class="">Username</label>
                                             <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                                        
                                                        @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                            </div>

                                        <div class="mb-10">
                                            <div class="form-group">
                                            <i class="fa fa-phone-square" aria-hidden="true"></i><label for="mail" class="">Telepon</label>
                                             <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                                        value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>
                                                    
                                                    @error('telepon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div>
                            <div class="form-group">
                            <i class="fa fa-lock" aria-hidden="true"></i><label for="password" class="">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i><label for="password" class="">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            <button style="background-color: black; color: white;" type="submit" class="btn btn-block mt-3 border-0">
                              {{ __('Register') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>

    </div>
</body>

</html>