<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <script src="{{ asset('qq/js/jquery.min.js') }}"></script>
    <script src="{{ asset('qq/js/popper.js') }}"></script>
    <script src="{{ asset('qq/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('qq/js/main.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('qq/css/style.css') }}">
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var jq = $.noConflict();
        // now you can use the "jq" variable instead of "$"
        jq(document).ready(function() {
            // your code here
        });
    </script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #ffffff; padding-left: 60px; padding-right: 60px; padding-top: 30px; padding-bottom: 30px" class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>