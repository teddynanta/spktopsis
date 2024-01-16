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

  <title>SPK PEMILIHAN BUS PARIWISATA METODE TOPSIS</title>
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/slider.css" rel="stylesheet" type="text/css" media="all">
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

<body class="mt-0 pt-0"><br>
  <!--navbar navbar-default navbar-custom-->
  <!--menu-->
  <nav class="navbar navbar-expand-lg text-dark bg-primary mt-0" data-bs-theme="dark">
    <div class="container justify-content-start w-50">
      <a class="navbar-brand" href="index2.php">Sistem Pendukung Keputusan Metode Topsis</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav align-items-end">
        <li class="nav-item">
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
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengajuan.php">Buat Pengajuan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    </div>
    </div>
  </nav><br><br>

  <div class="container w-50">
    <form action="tambahdata.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">data 1</label>
        <input type="text" class="form-control" name="data1">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">data 2</label>
        <input type="text" class="form-control" name="data2">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">data 3</label>
        <input type="text" class="form-control" name="data3">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">data 4</label>
        <input type="text" class="form-control" name="data4">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">data 5</label>
        <input type="text" class="form-control" name="data5">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">data 6</label>
        <input type="text" class="form-control" name="data6">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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