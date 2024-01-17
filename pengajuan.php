<?php
//koneksi
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SPK METODE TOPSIS</title>
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/slider.css" rel="stylesheet" type="text/css" media="all"> -->
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .footer {
      margin-top: auto;
      background-color: #f8f9fa;
      /* Change this to your preferred footer background color */
    }
  </style>
</head>

<body><br>
  <!--navbar navbar-default navbar-custom-->
  <!--menu-->
  <div class="container">
    <nav class="navbar navbar-expand-lg text-dark bg-primary mt-0" data-bs-theme="dark">
      <div class="container justify-content-start w-100">
        <a class="navbar-brand text-wrap" href="#">Sistem Pendukung Keputusan Metode Topsis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav align-items-center mx-5">
          <!-- <li class="nav-item">
            <a class="nav-link" href="kriteria.php">Kriteria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alternatif.php">Alternatif</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nilmat.php">Nilai Matriks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hastop.php">Hasil Topsis</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="pengajuan.php">Buat Pengajuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
          </li>
        </ul>
      </div>
    </nav><br><br>
  </div>
  <div class="container row mx-auto">
    <div class="card col-lg-12 col-md-6">
      <div class="card-header">
        Form pengajuan pinjaman
      </div>
      <div class="card-body">

        <?php
        $uid = $_SESSION['uid'];
        // $users = $koneksi->query("SELECT dokumen1, dokumen2, dokumen3, dokumen4, dokumen5 FROM users WHERE id ='$uid'");
        $users = $koneksi->query("SELECT dokumen1, dokumen2, dokumen3, dokumen4, dokumen5 FROM users WHERE id ='$uid' AND dokumen1 IS NOT NULL AND dokumen2 IS NOT NULL AND dokumen3 IS NOT NULL AND dokumen4 IS NOT NULL AND dokumen5 IS NOT NULL");
        if ($users->fetch_assoc() == null) : ?>
          <h5>Maaf, anda belum bisa melakukan pengajuan.</h5>
          <p>Dokumen pelengkap anda belum lengkap, lengkapi terlebih dahulu dokumen anda untuk dapat melakukan pengajuan pinjaman!</p>
          <a class="btn btn-primary" href="profil.php">Edit Profil</a>
        <?php else : ?>
          <h5 class="card-title mb-5">Silahkan isikan data anda!</h5>
          <form action="tambahpengajuan.php" method="post">
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">ID User</label>
              <input type="text" id="disabledTextInput" name="iduser" class="form-control" value="<?php echo $_SESSION['uid'] ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Nama</label>
              <input type="text" id="disabledTextInput" name="nama" class="form-control" value="<?php echo $_SESSION['nama'] ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
              <select class="form-select" aria-label="Default select example" name="pekerjaan">
                <option selected>Pekerjaan</option>
                <option value="5">Pegawai Negeri Sipil</option>
                <option value="4">Pegawai BUMN</option>
                <option value="3">Pegawai Swasta</option>
                <option value="2">Pegawai Harian Lepas</option>
                <option value="1">Tidak Bekerja</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Penghasilan per bulan</label>
              <select class="form-select" aria-label="Default select example" name="penghasilan">
                <option selected>Penghasilan</option>
                <option value="5">Di atas Rp. 10.000.000</option>
                <option value="4">Rp. 5.000.000 - Rp. 10.000.000</option>
                <option value="3">Rp. 1.000.000 - Rp. 5.000.000</option>
                <option value="2">Rp. 500.000 - Rp. 1.000.000 </option>
                <option value="1">Di Bawah Rp. 500.000</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Pengeluaran per bulan</label>
              <select class="form-select" aria-label="Default select example" name="pengeluaran">
                <option selected>Pengeluaran</option>
                <option value="5">Di atas Rp. 10.000.000</option>
                <option value="4">Rp. 5.000.000 - Rp. 10.000.000</option>
                <option value="3">Rp. 1.000.000 - Rp. 5.000.000</option>
                <option value="2">Rp. 500.000 - Rp. 1.000.000 </option>
                <option value="1">Di Bawah Rp. 500.000</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Hutang</label>
              <select class="form-select" aria-label="Default select example" name="hutang">
                <option selected>Hutang</option>
                <option value="5">Di atas Rp. 10.000.000</option>
                <option value="4">Rp. 5.000.000 - Rp. 10.000.000</option>
                <option value="3">Rp. 1.000.000 - Rp. 5.000.000</option>
                <option value="2">Rp. 500.000 - Rp. 1.000.000 </option>
                <option value="1">Di Bawah Rp. 500.000</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tabungan</label>
              <select class="form-select" aria-label="Default select example" name="tabungan">
                <option selected>Tabungan (Di Bank, Aset Tanah, Barang Berharga, dll)</option>
                <option value="5">Di atas Rp. 10.000.000</option>
                <option value="4">Rp. 5.000.000 - Rp. 10.000.000</option>
                <option value="3">Rp. 1.000.000 - Rp. 5.000.000</option>
                <option value="2">Rp. 500.000 - Rp. 1.000.000 </option>
                <option value="1">Di Bawah Rp. 500.000</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Buat Pengajuan</button>
          </form>
        <?php endif;
        ?>
      </div>
    </div>
  </div>

  <!--footer-->
  <footer class="footer mt-auto py-3 text-center">
    <div class="footer-below">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <em>Sistem Pendukung Keputusan Pemilihan Bus Pariwisata Metode Topsis</em>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!--plugin-->
  <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>