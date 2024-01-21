<?php
//koneksi
session_start();
include "koneksi.php";
include "head.php";
$uid = $_SESSION['uid'];
?>

<body class="d-flex flex-column h-100">
  <!--navbar navbar-default navbar-custom-->
  <!--menu-->
  <?php include "navbar.php"; ?>
  <div class="container">

  </div>
  <div class="container-xl mx-auto">
    <h3 class="m-0 font-weight-bold text-dark text-center">Form Pengajuan Pinjaman</h3>
    <div class="card shadow mb-4 mt-4">
      <div class="card-header py-3 bg-info">
        <h6 class="m-0 font-weight-bold text-white text-center">Data Dukung Pemohon</h6>
      </div>
      <div class="card-body">
        <p>Silahkan lanjutkan pengisian data.</p>
        <p>Isikan formulir ini dengan sebenar-benarnya.</p>
        <p>Setelah selesai anda akan diberikan formulir cetak berbentuk PDF.</p>
        <br>
        <form action="upload.php?id=<?= $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

          <input type="hidden" id="disabledTextInput" name="iduser" class="form-control" value="<?php echo $_SESSION['uid'] ?>" readonly>

          <div class="mb-3">
            <label for="formFile" class="form-label">Fotocopy KTP</label>
            <input class="form-control" type="file" id="formFile" name="dokumen1" accept=".pdf" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Fotocopy Surat Nikah & Kartu Keluarga</label>
            <input class="form-control" type="file" id="formFile" name="dokumen2" accept=".pdf" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Slip Gaji Terakhir (Dilegalisir, serta rincian gaji ditandatangani oleh Bendahara)</label>
            <input class="form-control" type="file" id="formFile" name="dokumen3" accept=".pdf" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Jaminan (SK KARPEG, TASPEN, SK CPNS, SK PNS, dan SK Terakhir)</label>
            <input class="form-control" type="file" id="formFile" name="dokumen4" accept=".pdf" required>
          </div>


          <button type="submit" class="btn btn-primary">Buat Pengajuan</button>
        </form>
      </div>
    </div>
  </div>

  <!--footer-->
  <?php include "footer.php" ?>

  <!--plugin-->
  <script src="assets/bootstrap.bundle.min.js"></script>

</body>

</html>