<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }} ">
                    <a href="{{ route('dashboard-admin') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                @if (auth()->user()->role == 'ADMIN'  )
                    
                    <li class="sidebar-item  {{ request()->is('admin/generate-akun*') ? 'active' : '' }} has-sub">
                        <a class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Generate Akun</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ request()->is('admin/generate-akun') ? 'active' : '' }} ">
                                <a href="{{ route('generate-akun.index') }}"> akun siswa</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('generate-akun-verifikator.index') }}"> Akun Verifikator</a>
                            </li>

                        </ul>
                    
                    </li>

                    <li class="sidebar-item has-sub">
                        <a class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Pengaturan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ request()->is('admin/generate-akun') ? 'active' : '' }} ">
                                <a href="{{ route('data-transportasi.index') }}"> Data Transportasi</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('data-agama.index') }}"> Data Agama</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('data-jenis-tinggal.index') }}"> Data Jenis Tinggal</a>
                            </li>
                            
                            <li class="submenu-item">
                                <a href="{{ route('data-pekerjaan.index') }}"> Data Pekerjaan</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('data-pendidikan.index') }}"> Data Pendidikan</a>
                            </li>
                            
                            <li class="submenu-item">
                                <a href="{{ route('data-penghasilan.index') }}"> Data Penghasilan</a>
                            </li>

                        </ul>
                    
                    </li>
                @endif


             

                <li class="sidebar-title">Data Siswa</li>


                <li class="sidebar-item ">
                    <a href="{{ route('admin.biodata-diri.index') }}" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Data Biodata Diri</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                        <i class="bi bi-puzzle"></i>
                        <span>sadsa</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>


 