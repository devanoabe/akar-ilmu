
<nav style="background-color: #f8f9fa; border: none !important; outline: none !important;" class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="color: black; font-size: 13px; font-weight: bolder" class="mr-2 d-none d-lg-inline">{{ Auth::user()->name }}</span>
                <img style="width: 25px; height: auto" class="img-profile rounded-circle" src="{{asset('images/faces/4.jpg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div style="color: black" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>


