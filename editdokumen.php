<?php
//koneksi
session_start();
include "koneksi.php";
include "head.php";
?>

<body class="d-flex flex-column h-100">
  <!--navbar navbar-default navbar-custom-->
  <?php include "navbar.php" ?>;
  <div class="container-xl">
    <h2 class="text-center">Edit Dokumen</h2>

    <div class="row">
      <div class="col-lg-12 col-md-6">
        <div class="card shadow mb-4 mt-4">
          <div class="card-header py-3 text-center">
            <?= $_GET['nama']; ?>
          </div>
          <!-- <div class="row"> -->
          <div class="card-body">
            <!-- Tab panes -->
            <div class="tab-content row">
              <div class="col-lg-12 col-md-6">
                <form action="upload.php?id=<?= $_GET['id']; ?>&uid=<?= $_SESSION['uid']; ?>" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Masukkan dokumen anda</label>
                    <input class="form-control" type="file" id="formFile" name="<?= $_GET['id']; ?>" accept=".pdf" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
          <!--panel body-->
        </div>
      </div>
    </div>
  </div>

  <!--footer-->
  <?php include "footer.php" ?>;

  <!--plugin-->
  <script src="assets/bootstrap.bundle.min.js"></script>

</body>

</html>