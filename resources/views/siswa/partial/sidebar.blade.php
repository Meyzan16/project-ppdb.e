<nav class="sidebar sidebar-offcanvas" >
    <ul class="nav">
      {{-- <li class="nav-item">
        <a href="{{ route('dashboard-siswa') }}"
          class="nav-link {{ request()->is('siswa') ? 'active' : '' }}" >
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li> --}}
    
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard-siswa') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('biodata-diri') }}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Manajemen Data</span>
        </a>
      </li>


      
    </ul>
  </nav>