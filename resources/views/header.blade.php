<nav class="navbar navbar-inverse navbar-fixed-top navbar-toggleable-md">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="/">Hall 10</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            @if (Auth::check())
                <ul class="nav navbar-nav">
                @if (Auth::user()->role == 'pewajib')
                    <li class="{{ Request::segment(1) === 'jemaat' ? 'active' : null }}"><a href="/jemaat">Kaum Saleh</a></li>
                    <li class="{{ Request::segment(1) === 'kelompok' ? 'active' : null }}"><a href="/kelompok">Daftar Grup</a></li>
                    <li class="{{ Request::segment(1) === 'sidang' ? 'active' : null }}"><a href="/sidang">Daftar Sidang</a></li>
                @endif
                    <li class="{{ Request::segment(1) === 'absensi' ? 'active' : null }}"><a href="/absensi">Absensi</a></li>
                    <li class="{{ Request::segment(1) === 'hadir' ? 'active' : null }}"><a href="/hadir">Laporan</a></li>
                </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>