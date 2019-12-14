<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i><img src="<?= base_url('assets'); ?> /img/logo.png" alt="" height=60 width=120></i>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Manajemen pembayarn -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('cadmin/admin'); ?>">
            <i class="fas fa-file-invoice-dollar"></i>
            <span>Data Pembayaran</span></a>
    </li>

    <!-- Nav Item - Manajemen paket -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-cube"></i>
            <span>Paket</span></a>
    </li>

    <!-- Nav Item - Manajemen data peserta -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-users"></i>
            <span>List Peserta</span></a>
    </li>

    <!-- Nav Item - Manajemen data admin -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-id-badge"></i>
            <span>Manag. Admin</span></a>
    </li>
</ul>