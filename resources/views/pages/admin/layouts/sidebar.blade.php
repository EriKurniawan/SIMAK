<aside class="main-sidebar edit-sidebar elevation-6">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/img/SIMAK-01.png" class="brand-image elevation-3">
        <span class="brand-text font-weight-light">Simak</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/surat/sm/index" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Surat Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/surat/sk/index" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open"></i>
                        <p>
                            Surat Keluar
                        </p>
                    </a>
                <li class="nav-item">
                    @if (auth()->user()->level == 'admin' || auth()->user()->level == 'operator')
                        <a href="/user/index" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Kelola Pengguna
                            </p>
                        </a>
                    @endif
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
