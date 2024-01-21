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
            <h6 class="m-0 font-weight-bold text-info">Dokumen Pendukung</h6>
            <div class="table-responsive mb-3">
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
                  $rows = $koneksi->query("SELECT * FROM tab_pengajuan WHERE id_pengajuan = '$id'");
                  $row = $rows->fetch_assoc();
                  $datap = $koneksi->query("SELECT * FROM data_pemohon WHERE id_pengajuan = '$id'");
                  $pemohon = $datap->fetch_assoc();
                  $datak = $koneksi->query("SELECT * FROM data_pekerjaan WHERE id_pengajuan = '$id'");
                  $kerja = $datak->fetch_assoc();
                  $datah = $koneksi->query("SELECT * FROM data_penghasilan WHERE id_pengajuan = '$id'");
                  $hasil = $datah->fetch_assoc();
                  $datam = $koneksi->query("SELECT * FROM data_permohonan WHERE id_pengajuan = '$id'");
                  $mohon = $datam->fetch_assoc();
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

            <h6 class="m-0 font-weight-bold text-info">Data Pemohon</h6>
            <div class="table-responsive mb-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">Tanggal Lahir</th>
                    <th class="align-middle text-center">Kewarganegaraan</th>
                    <th class="align-middle text-center">No. KTP</th>
                    <th class="align-middle text-center">No. NPWP</th>
                    <th class="align-middle text-center">Status Pernikahan</th>
                    <th class="align-middle text-center">Nama Pasangan</th>
                    <th class="align-middle text-center">Tanggal Lahir Pasangan</th>
                    <th class="align-middle text-center">Alamat Sesuai KTP</th>
                    <th class="align-middle text-center">Alamat Sesuai Domisili</th>
                    <th class="align-middle text-center">No. Telepon</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $pemohon['nama']; ?></td>
                    <td><?= $pemohon['bdate']; ?></td>
                    <td><?= $pemohon['warga']; ?></td>
                    <td><?= $pemohon['nik']; ?></td>
                    <td><?= $pemohon['npwp']; ?></td>
                    <td><?= $pemohon['nikah']; ?></td>
                    <td><?= $pemohon['pnama']; ?></td>
                    <td><?= $pemohon['pbdate']; ?></td>
                    <td><?= $pemohon['alamat']; ?></td>
                    <td><?= $pemohon['alamatdom']; ?></td>
                    <td><?= $pemohon['notel']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <h6 class="m-0 font-weight-bold text-info">Data Pekerjaan Pemohon</h6>
            <div class="table-responsive mb-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">Pekerjaan</th>
                    <th class="align-middle text-center">NIP</th>
                    <th class="align-middle text-center">Nama Dinas/Instansi/Perusahaan</th>
                    <th class="align-middle text-center">Lama Bekerja</th>
                    <th class="align-middle text-center">Jabatan</th>
                    <th class="align-middle text-center">Alamat Kantor</th>
                    <th class="align-middle text-center">No. Telepon Kantor</th>
                    <th class="align-middle text-center">Atasan</th>
                    <th class="align-middle text-center">Jabatan Atasan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $pemohon['nama']; ?></td>
                    <td><?= $kerja['pekerjaan']; ?></td>
                    <td><?= $kerja['NIP']; ?></td>
                    <td><?= $kerja['perusahaan']; ?></td>
                    <td><?= $kerja['lamakerja']; ?></td>
                    <td><?= $kerja['Jabatan']; ?></td>
                    <td><?= $kerja['alamatkantor']; ?></td>
                    <td><?= $kerja['notelkantor']; ?></td>
                    <td><?= $kerja['atasan']; ?></td>
                    <td><?= $kerja['jab_atasan']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <h6 class="m-0 font-weight-bold text-info">Data Penghasilan Pemohon</h6>
            <div class="table-responsive mb-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">Penghasilan per Bulan</th>
                    <th class="align-middle text-center">Tunjangan (Sertifikasi)</th>
                    <th class="align-middle text-center">Tunjangan (TPP)</th>
                    <th class="align-middle text-center">Tunjangan Lainnya</th>
                    <th class="align-middle text-center">No. Rekening</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $pemohon['nama']; ?></td>
                    <td><?= $hasil['penghasilan']; ?></td>
                    <td><?= $hasil['sertifikasi']; ?></td>
                    <td><?= $hasil['tpp']; ?></td>
                    <td><?= $hasil['lainnya']; ?></td>
                    <td><?= $hasil['norek']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <h6 class="m-0 font-weight-bold text-info">Data Permohonan Kredit</h6>
            <div class="table-responsive mb-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">Jumlah Permohonan Kredit</th>
                    <th class="align-middle text-center">Rencana Jangka Waktu Peminjaman</th>
                    <th class="align-middle text-center">Tujuan Permohonan Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $pemohon['nama']; ?></td>
                    <td><?= $mohon['permohonan']; ?></td>
                    <td><?= $mohon['jangka']; ?></td>
                    <td><?= $mohon['tujuan']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nilai Matriks</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <form action="penilaian.php?id=<?= $_GET['uid']; ?>" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">C1. Karakter</label>
                  <select class="custom-select" aria-label="Default select example" name="c1">
                    <option selected>Nilai</option>
                    <option value="90">Sangat Baik</option>
                    <option value="80">Baik</option>
                    <option value="70">Cukup Baik</option>
                    <option value="60">Kurang Baik</option>
                    <option value="50">Tidak Baik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">C2. Kapasitas</label>
                  <select class="custom-select" aria-label="Default select example" name="c2">
                    <option selected>Nilai</option>
                    <option value="90">Sangat Baik</option>
                    <option value="80">Baik</option>
                    <option value="70">Cukup Baik</option>
                    <option value="60">Kurang Baik</option>
                    <option value="50">Tidak Baik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">C3. Modal</label>
                  <select class="custom-select" aria-label="Default select example" name="c3">
                    <option selected>Nilai</option>
                    <option value="90">Sangat Baik</option>
                    <option value="80">Baik</option>
                    <option value="70">Cukup Baik</option>
                    <option value="60">Kurang Baik</option>
                    <option value="50">Tidak Baik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">C4. Jaminan</label>
                  <select class="custom-select" aria-label="Default select example" name="c4">
                    <option selected>Nilai</option>
                    <option value="90">Sangat Baik</option>
                    <option value="80">Baik</option>
                    <option value="70">Cukup Baik</option>
                    <option value="60">Kurang Baik</option>
                    <option value="50">Tidak Baik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">C5. Kondisi</label>
                  <select class="custom-select" aria-label="Default select example" name="c5">
                    <option selected>Nilai</option>
                    <option value="90">Sangat Baik</option>
                    <option value="80">Baik</option>
                    <option value="70">Cukup Baik</option>
                    <option value="60">Kurang Baik</option>
                    <option value="50">Tidak Baik</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
              </form>
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