<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      @auth
      <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Welcome, {{ auth()->user()->name }}</a>
          <ul class="dropdown-menu">
            <li><a href="/profile" class="dropdown-item"><i class="fas fa-user"></i> My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
      </li>
          {{-- <li class="nav-item d-none d-sm-inline-block bg-danger">
            <a href="" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li> --}}
      @else
        <li class="nav-item d-none d-sm-inline-block bg-primary mx-2">
          <a href="{{ route('login') }}" class="nav-link">Login</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block bg-primary mx-2">
          <a href="{{ route('register') }}" class="nav-link">Register</a>
        </li>
      @endauth
      
    </ul>
  </nav>