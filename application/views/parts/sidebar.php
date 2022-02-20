 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://upload.wikimedia.org/wikipedia/commons/3/35/Lambang_Polda_Lampung.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Vaksinasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ucwords($this->session->userdata('nama')); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo base_url(); ?>dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="<?php echo base_url(); ?>capaian" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Capaian Vaksinasi
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="<?php echo base_url(); ?>rencana" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Rencana Vaksin
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="<?php echo base_url(); ?>stok" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Stok Vaksin
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="<?php echo base_url(); ?>personel" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manajemen Pengguna
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="<?php echo base_url(); ?>login/signout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>