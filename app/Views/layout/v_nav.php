<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
        <img src="<?= base_url() ?>/template/dist/img/unm-04.png" alt="Logo UNM" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIPAS LP2M UNM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item active">
                    <a href="/" class="nav-link <?= ($uri == '') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="<?= base_url() ?>/surat_masuk" class="nav-link <?= ($uri == 'surat_masuk') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Surat Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="<?= base_url() ?>/surat_keluar" class="nav-link <?= ($uri == 'surat_keluar') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Surat Keluar
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if ($uri == 'laporan_surat_masuk') {
                                        echo 'menu-open';
                                    } else if ($uri == 'laporan_surat_keluar') {
                                        echo 'menu-open';
                                    } ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Cetak Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/laporan/laporan_surat_masuk" class="nav-link <?= ($uri == 'laporan_surat_masuk') ? 'active' : '' ?>">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Surat Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/laporan/laporan_surat_keluar" class="nav-link <?= ($uri == 'laporan_surat_keluar') ? 'active' : '' ?>">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Surat Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Kode Surat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Backup Database</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Restore Database </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>