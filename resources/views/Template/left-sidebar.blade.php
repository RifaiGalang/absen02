<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset ('AdminLte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Absensi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('AdminLte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (auth()->user()->level =="pegawai")
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="fas regular fa-clock"></i>
              <p>
                Absensi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('absensi-masuk')}}" class="nav-link ">
                <i class="fas fa-sign-in-alt"></i>
                  <p>Absensi Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('absensi-keluar')}}" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                  <p>Absensi Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item ">
            <a href="{{ route('filter-data') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            @if (auth()->user()->level == "admin")
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absensi Per Pegawai</p>
                </a>
              </li>
             
              <li class="nav-item">
              <a href="{{ route('filter-data') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absensi Keseluruhan</p>
                </a>
              </li>
             
              <li class="nav-item">
              <a href="{{ route('Data-pegawai') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                Data Pegawai
                </a>
              </li>
            @endif
          </ul>
          </li>
        
<li class="nav-item">
<a href="{{ route('logout')}}" class="nav-link">
  <i class="fas fa-sign-out-alt"></i>
  <p>Logout</p>
</a>
</li>
</ul>
      </nav>
     
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>