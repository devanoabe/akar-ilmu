<head>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
</head>

<aside style="background: #f8f9fa; padding: 20px" class="main-sidebar">

    <!-- Brand Logo -->
    <a style="color: white; display: flex; align-items: center;" href="#" class="brand-link">
        <img src="{{ asset('assets/dist/img/a.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="margin-right: 10px;">
        <span style="color: black; display: flex; flex-direction: column; margin-top: 18px">
            <span style="font-size: 16px" class="brand-text font-weight-bold mb-0">AKAR ILMU</span>
            <p style="font-size: 14px; margin-top: -5px">Setting Admin</p>
        </span>
    </a>

    <hr style="margin-top: -5px">


    <!-- Sidebar -->
    <div style="margin-top: -17px" class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <div style="color: #858796; font-size: 15px; font-weight: bolder" class="sidebar-heading my-2 pl-3">
                    <i style="font-size: 7px; color: blue; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>Dashboard
                </div>
                <li class="nav-item pill-1">
                    <a style="color: #38373e; font-weight: light" href="{{ route('admin.beranda') }}" class="nav-link {{ (request()->routeIs('admin.beranda') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('admin.beranda') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('admin.beranda') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-home" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">Dashboard</p>
                        </div>
                    </a>
                </li>
                <div style="color: #858796; font-size: 15px; font-weight: bolder" class="sidebar-heading my-2 pl-3">
                    <i style="font-size: 7px; color: #36b9cc; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>Main Menu
                </div>
                <li class="nav-item pill-2">
                    <a style="color: #38373e; font-weight: light;" href="{{ route('admin.user') }}" class="nav-link {{ (request()->routeIs('admin.user') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('admin.user') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('admin.user') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-user" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">User</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item pill-3">
                    <a style="color: #38373e; font-weight: light;" href="{{ route('mapel.index') }}" class="nav-link {{ (request()->routeIs('mapel.index') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('mapel.index') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('mapel.index') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-book" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">Mata Pelajaran</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item pill-3">
                    <a style="color: #38373e; font-weight: light;" href="{{ route('admin.exam') }}" class="nav-link {{ (request()->routeIs('admin.exam') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('admin.exam') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('admin.exam') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-th" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">Tryout</p>
                        </div>
                    </a>
                </li>
                <div style="color: #858796; font-size: 15px; font-weight: bolder" class="sidebar-heading my-2 pl-3">
                    <i style="font-size: 7px; color: #1cc88a; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>Marks Menu
                </div>
                <li class="nav-item pill-3">
                    <a style="color: #38373e; font-weight: light;" href="{{ route('admin.marks') }}" class="nav-link {{ (request()->routeIs('admin.marks') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('admin.marks') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('admin.marks') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-check" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">Nilai</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item pill-3">
                    <a style="color: #38373e; font-weight: light;" href="{{ route('admin.qna') }}" class="nav-link {{ (request()->routeIs('admin.qna') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('admin.qna') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('admin.qna') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-question" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">Soal</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item pill-3">
                    <a style="color: #38373e; font-weight: light;" href="{{ route('admin.review') }}" class="nav-link {{ (request()->routeIs('admin.review') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: {{ (request()->routeIs('admin.review') ? 'black' : 'white') }}; 
                            padding: 10px; border-radius: 10px; color: {{ (request()->routeIs('admin.review') ? 'white' : 'black') }};" class="elevation-2">
                                <i class="nav-icon fas fa-signal" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;">Review</p>
                        </div>
                    </a>
                </li>
                <div style="color: #858796; font-size: 15px; font-weight: bolder" class="sidebar-heading my-2 pl-3">
                    <i style="font-size: 7px; color: red; vertical-align: middle;" class="fa fa-circle pr-2" aria-hidden="true"></i>Exit Session
                </div>
                <li class="nav-item pill-3">
                    <a style="color: #38373e; font-weight: light;" href="#" class="nav-link {{ (request()->routeIs('hobi') ? 'active' : '') }}">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; background-color: white; padding: 10px; border-radius: 10px" class="elevation-2">
                                <i class="nav-icon fas fa-coffee" style="margin: 0 auto;"></i>
                            </div>
                            <p style="margin-left: 10px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                </form>
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

