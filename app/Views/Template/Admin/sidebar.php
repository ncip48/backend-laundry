<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-grin-squint-tears"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Administrator</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <?php if ($menu == 'barang') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUU" aria-expanded="true" aria-controls="collapseUU">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Data Barang </span>
        </a>
        <div id="collapseUU" class="collapse" aria-labelledby="headingUU" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Menu:</h6>
                <a class="collapse-item" href="<?= base_url('admin/konseling'); ?>">Konseling</a>
                <a class="collapse-item" href="<?= base_url('admin/perizinan'); ?>">Perizinan</a>
                <a class="collapse-item" href="<?= base_url('admin/kelas'); ?>">Daftar Kelas</a>
                <a class="collapse-item" href="<?= base_url('admin/daftar_absen'); ?>">Presensi</a>
                <a class="collapse-item" href="<?= base_url('admin/pelanggaran'); ?>">Pelanggaran</a>
            </div>
        </div>
        </li> -->

    <!-- <?php if ($menu == 'kategori') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('admin/kategori'); ?>">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Kategori </span>
        </a>
        </li> -->

    <?php if ($menu == 'customer') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('admin/customer'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer </span>
        </a>
        </li>

        <?php if ($menu == 'produk') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('admin/produk'); ?>">
                <i class="fas fa-fw fa-box"></i>
                <span>Produk </span>
            </a>
            </li>

            <?php if ($menu == 'karyawan') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url('admin/karyawan'); ?>">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Karyawan </span>
                </a>
                </li>


                <?php if ($menu == 'barang') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUU" aria-expanded="true" aria-controls="collapseUU">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Laporan </span>
                    </a>
                    <div id="collapseUU" class="collapse" aria-labelledby="headingUU" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pilih Menu:</h6>
                            <a class="collapse-item" href="<?= base_url('admin/konseling'); ?>">Konseling</a>
                            <a class="collapse-item" href="<?= base_url('admin/perizinan'); ?>">Perizinan</a>
                            <a class="collapse-item" href="<?= base_url('admin/kelas'); ?>">Daftar Kelas</a>
                            <a class="collapse-item" href="<?= base_url('admin/daftar_absen'); ?>">Presensi</a>
                            <a class="collapse-item" href="<?= base_url('admin/pelanggaran'); ?>">Pelanggaran</a>
                        </div>
                    </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Pengaturan
                    </div>


                    <?php if ($menu == 'menu-5') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url('admin/setting'); ?>">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Pengaturan Akun</span>
                        </a>
                        </li>

                        <!-- Nav Item - Tables -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

</ul>
<!-- End of Sidebar -->