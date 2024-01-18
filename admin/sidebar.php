        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-calculator"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SPK TOPSIS</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>
          <?php
          if ($_SESSION['role'] == 'pimpinan') :

          ?>
          <?php else : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              TOPSIS
            </div>

            <!-- Nav Item - Kriteria -->
            <li class="nav-item">
              <a class="nav-link" href="kriteria.php">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Kriteria</span></a>
            </li>

            <!-- Nav Item - Hasil TOPSIS -->
            <li class="nav-item">
              <a class="nav-link" href="topsis.php">
                <i class="fas fa-fw fa-poll"></i>
                <span>Hasil Topsis</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Pengguna
            </div>

            <!-- Nav Item - Manajemen Pengguna -->
            <li class="nav-item">
              <a class="nav-link" href="user.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Manajemen Pengguna</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
          <?php endif; ?>
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>


        </ul>
        <!-- End of Sidebar -->