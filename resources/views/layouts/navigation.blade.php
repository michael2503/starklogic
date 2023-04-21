<header>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logoBWy.png') }}" alt="stark-Logic Logo" width="120">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                @if (Auth::user())
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('dashboard')) isActive @endif" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('getLinks')) isActive @endif" href="{{ route('getLinks') }}">Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('profile.edit')) isActive @endif" href="{{ route('profile.edit') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logoutForm').submit();" href="#">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    <form method="POST" id="logoutForm" action="{{ route('logout') }}">
        @csrf
    </form>

</header>
