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
            <h1 class="h3 mb-0 text-gray-800">Edit Kriteria</h1>
          </div>
        </div>
        <!-- Content Row -->
        <?php
        $id = $_GET['id'];
        $sql = $koneksi->query("SELECT * FROM tab_kriteria WHERE id_kriteria = $id");
        $row = $sql->fetch_assoc();
        ?>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
          </div>
          <div class="card-body">
            <form action="pe_kriteria.php?id=<?= $id; ?>" method="post">
              <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nama</label>
                <input type="text" id="disabledTextInput" name="nama" class="form-control" value="<?= $row['nama_kriteria']; ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bobot</label>
                <select class="custom-select" aria-label="Default select example" name="bobot">
                  <option>Bobot</option>
                  <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <option value="<?= $i; ?>" <?php echo $i == $row['bobot'] ? "selected" : "" ?>><?= $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select class="custom-select" aria-label="Default select example" name="status">
                  <option>Status</option>
                  <option value="Cost" <?= $row['status'] == 'Cost' ? 'selected' : "" ?>>Cost</option>
                  <option value="Benefit" <?= $row['status'] == 'Benefit' ? 'selected' : "" ?>>Benefit</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Edit Kriteria</button>
            </form>
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