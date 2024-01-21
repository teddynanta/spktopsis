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
      <div class="card-header py-3 bg-success">
        <h6 class="m-0 font-weight-bold text-white text-center">Data Pekerjaan Pemohon</h6>
      </div>
      <div class="card-body">
        <p>Silahkan lanjutkan pengisian data.</p>
        <p>Isikan formulir ini dengan sebenar-benarnya.</p>
        <p>Setelah selesai anda akan diberikan formulir cetak berbentuk PDF.</p>
        <br>
        <form action="pdp_pemohon.php" method="POST">

          <input type="hidden" id="disabledTextInput" name="iduser" class="form-control" value="<?php echo $_SESSION['uid'] ?>" readonly>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
            <select class="form-select" aria-label="Default select example" name="pekerjaan">
              <option selected>Jawaban</option>
              <option value="1">PNS</option>
              <option value="2">CPNS</option>
              <option value="3">Pegawai BUMN/BUMD</option>
              <option value="4">Anggota DPRD</option>
              <option value="5">Pegawai Swasta</option>
              <option value="6">Pensiunan</option>
              <option value="7">Lainnya</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">NIP &nbsp; <span class="text-danger">*kosongkan apabila tidak ada</span></label></label>
            <input type="number" id="disabledTextInput" name="nip" class="form-control" placeholder="Masukan NIP Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Instansi/Dinas/Perusahaan </label>
            <input type="text" id="disabledTextInput" name="perusahaan" class="form-control" placeholder="Masukan Nama Kantor Anda">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lama Bekerja</label>
            <select class="form-select" aria-label="Default select example" name="lamakerja">
              <option selected>Jawaban</option>
              <option value="1">1 Tahun</option>
              <option value="2">2 Tahun</option>
              <option value="3">3 Tahun</option>
              <option value="4">4 Tahun</option>
              <option value="5">5 Tahun</option>
              <option value="6">Di Atas 5 Tahun</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jabatan</label>
            <select class="form-select" aria-label="Default select example" name="jabatan">
              <option selected>Jawaban</option>
              <option value="1">Direktur/Kepala Kantor/Kepala Dinas</option>
              <option value="2">Manajer/Kepala Bagian</option>
              <option value="3">Kepala Seksi</option>
              <option value="4">Staf</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Alamat Kantor</label>
            <input type="text" id="disabledTextInput" name="alamatkantor" class="form-control" placeholder="Masukan Alamat Kantor Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">No. Telepon Kantor</label>
            <input type="text" id="disabledTextInput" name="notelkantor" class="form-control" placeholder="Masukan No. Telepon Kantor Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Atasan</label>
            <input type="text" id="disabledTextInput" name="atasan" class="form-control" placeholder="Masukan Nama Atasan Anda">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jabatan Atasan</label>
            <select class="form-select" aria-label="Default select example" name="jab_atasan">
              <option selected>Jawaban</option>
              <option value="1">Direktur/Kepala Kantor/Kepala Dinas</option>
              <option value="2">Manajer/Kepala Bagian</option>
              <option value="3">Kepala Seksi</option>
              <option value="4">Staf</option>
            </select>
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