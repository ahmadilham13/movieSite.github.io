<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @auth
          <p class="d-block text-light">{{ Auth::user()->name }} ({{ Auth::user()->profile->umur }} th)</p>
        @else
          <p class="d-block text-light">Tamu (Guest)</p>
        @endauth
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="/halaman" class="nav-link {{ Request::is('data-tables') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Halaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/data-tables" class="nav-link {{ Request::is('data-tables') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Table</p>
                </a>
              </li>
            </ul>
        </li>
         <li class="nav-item has-treeview">
          <a href="/film" class="nav-link {{ Request::is('cast*') ? 'active' : '' }} {{ Request::is('genre*') ? 'active' : '' }} {{ Request::is('film*') ? 'active' : '' }} {{ Request::is('showGenre') ? 'active' : '' }} {{ Request::is('showFilm') ? 'active' : '' }} {{ Request::is('showCast') ? 'active' : '' }}">
            <i class="nav-icon fas fa-film"></i>
              <p>
                Film
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cast" class="nav-link {{ Request::is('cast*') ? 'active' : '' }}">
                <i class="bi bi-c-square nav-icon"></i>
                <p>Cast</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="/genre" class="nav-link {{ Request::is('genre*') ? 'active' : '' }}">  
                  <i class="bi bi-files nav-icon"></i>
                    <p>
                      Genre
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/film" class="nav-link {{ Request::is('film*') ? 'active' : '' }}">
                  <i class="bi bi-file-text nav-icon"></i>
                  <p>
                    Film
                  </p>
                </a>
              </li>
            </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>