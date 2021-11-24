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

           

                <li class="sidebar-item  {{ request()->is('admin/generate-akun*') ? 'active' : '' }} has-sub">
                    <a class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Generate Akun</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ request()->is('admin/generate-akun') ? 'active' : '' }} ">
                            <a href="{{ route('generate-akun.index') }}"> Tambah akun siswa</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('generate-akun.index') }}"> Data Akun</a>
                        </li>

                    </ul>
                   
                </li>

             

                <li class="sidebar-title">Forms &amp; Tables</li>


                <li class="sidebar-item  ">
                    <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Documentation</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>