<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?= base_url('cmanagementpembayaran/mp'); ?>>
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets'); ?> /img/logo.png" alt="" height=70 width=225 />
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Manajemen pembayarn -->
    <?php
    if ($sidebar == '1') {
        echo '<li class="nav-item active">';
    } else {
        echo '<li class="nav-item">';
    }  ?>
    <a class="nav-link" href=<?= base_url('cmanagementpembayaran/mp'); ?>>
        <i class="fas fa-file-invoice-dollar"></i>
        <span>Data Pembayaran</span></a>
    </li>

    <!-- Nav Item - Manajemen paket -->
    <?php
    if ($sidebar == '2') {
        echo '<li class="nav-item active">';
    } else {
        echo '<li class="nav-item">';
    }  ?>
    <a class="nav-link" href=<?= base_url('cpaket/paket'); ?>>
        <i class="fas fa-cube"></i>
        <span>Paket</span></a>
    </li>

    <!-- Nav Item - Manajemen data peserta -->


    <!-- Nav Item - Manajemen data admin -->
    <?php
    if ($sidebar == '4') {
        echo '<li class="nav-item active">';
    } else {
        echo '<li class="nav-item">';
    }  ?>
    <a class="nav-link" href=<?= base_url('cadmin/admin'); ?>>
        <i class="fas fa-id-badge"></i>
        <span>Manag. Admin</span></a>
    </li>

    <?php
    if ($sidebar == '5') {
        echo '<li class="nav-item active">';
    } else {
        echo '<li class="nav-item">';
    }  ?>
    <a class="nav-link" href=<?= base_url('corder/order'); ?>>
        <i class="fas fa-id-badge"></i>
        <span>Manag. Order</span></a>
    </li>
</ul>