 <ul class="sidebar navbar-nav" style="background-color:  #2F4F4F">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/barang')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kelola Barang</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/pemesanan')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelola Pemesanan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/kategori')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelola Kategori</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/transaksi')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Lihat Transaksi</span></a>
        </li>
      </ul>