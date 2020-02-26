<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'lokasi' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>DATA GEDUNG</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/lokasi/add') ?>">Tambah Data Gedung</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/lokasi') ?>">Daftar Gedung</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'transaksi' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>DATA TRANSAKSI</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/transaksi/add_page') ?>">Tambah Data Transaksi</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/transaksi') ?>">Daftar Data Transaksi</a>
        </div>
    </li>   
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?= site_url('admin/history') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>History</span>
        </a>
    </li> 
    <!--<li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'user' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>DATA USER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user/add') ?>">Tambah Data User</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/user') ?>">Daftar Data Users</a>
        </div>
    </li>-->
    <!--<li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>LAPORAN</span></a>
    </li>-->
</ul>