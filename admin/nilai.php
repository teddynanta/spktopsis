<?php

include "header.php";

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include "sidebar.php";
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        include "topbar.php";
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penilaian</h1>
          </div>
        </div>
        <!-- Content Row -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Dokumen 1</th>
                    <th>Dokumen 2</th>
                    <th>Dokumen 3</th>
                    <th>Dokumen 4</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $uid = $_GET['uid'];
                  $id = $_GET['id'];
                  $users = $koneksi->query("SELECT * FROM users WHERE id = $uid");
                  $user = $users->fetch_assoc();
                  $rows = $koneksi->query("SELECT * FROM tab_pengajuan WHERE id=$id");
                  $row = $rows->fetch_assoc();
                  ?>
                  <tr>
                    <td style="width: 5%;"><?= $user['nama']; ?></td>
                    <td><?= $row['tgl_pengajuan']; ?></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen1']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen2']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen3']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen4']; ?>"><i class="fas fa-eye"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
      include "footer.php";
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>