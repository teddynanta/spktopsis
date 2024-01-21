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
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Data Pemohon</h6>
      </div>
      <div class="card-body">
        <p>Isikan formulir ini dengan sebenar-benarnya.</p>
        <p>Setelah selesai anda akan diberikan formulir cetak berbentuk PDF.</p>
        <br>
        <form action="pd_pemohon.php" method="POST">
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">ID User</label>
            <input type="text" id="disabledTextInput" name="iduser" class="form-control" value="<?php echo $_SESSION['uid'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Sesuai KTP</label>
            <input type="text" id="disabledTextInput" name="nama" class="form-control" value="<?php echo $_SESSION['nama'] ?>">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Tanggal Lahir</label>
            <input type="date" id="disabledTextInput" name="bdate" class="form-control">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kewarganegaraan</label>
            <select class="form-select" aria-label="Default select example" name="warga">
              <option selected>Jawaban</option>
              <option value="1">Warga Negara Indonesia</option>
              <option value="2">Warga Negara Asing (WNA)</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">No. KTP</label>
            <input type="number" id="disabledTextInput" name="nik" class="form-control" placeholder="Masukan 16 Digit No. KTP">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">No. NPWP (untuk pinjaman di atas 100JT) &nbsp; <span class="text-danger">*kosongkan apabila tidak perlu</span></label>
            <input type="text" id="disabledTextInput" name="npwp" class="form-control" placeholder="Masukan No. NPWP">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Gadis Ibu Kandung</label>
            <input type="text" id="disabledTextInput" name="ibu" class="form-control" placeholder="Masukan Nama Gadis Ibu Kandung Anda">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Status Pernikahan</label>
            <select class="form-select" aria-label="Default select example" name="nikah">
              <option selected>Jawaban</option>
              <option value="1">Belum Menikah</option>
              <option value="2">Menikah</option>
              <option value="3">Janda/Duda</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Istri/Suami &nbsp; <span class="text-danger">*kosongkan apabila tidak ada</span></label></label>
            <input type="text" id="disabledTextInput" name="pnama" class="form-control" placeholder="Masukan Nama Pasangan Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Tanggal Lahir Istri/Suami &nbsp; <span class="text-danger">*kosongkan apabila tidak ada</span></label></label></label>
            <input type="date" id="disabledTextInput" name="pbdate" class="form-control">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Alamat Sesuai KTP</label>
            <input type="text" id="disabledTextInput" name="alamat" class="form-control" placeholder="Masukan Alamat Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Alamat Sesuai Domisili</label>
            <input type="text" id="disabledTextInput" name="alamatdom" class="form-control" placeholder="Masukan Alamat Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">No. Telepon yang Dapat Dihubungi</label>
            <input type="text" id="disabledTextInput" name="notel" class="form-control" placeholder="Masukan Alamat Anda">
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