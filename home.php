<?php
session_start();
include "koneksi.php";
include "head.php";
$uid = $_SESSION['uid'];

$sql = $koneksi->query("SELECT * FROM tab_pengajuan WHERE id_user = $uid");
// var_dump($sql);
?>

<body class="d-flex flex-column h-100">
  <?php

  include "navbar.php";

  ?>

  <main class="container-xl">
    <h3 class="m-0 font-weight-bold text-dark text-center">Selamat Datang!</h3>
    <div class="card shadow mb-4 mt-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark text-center">Data Pengajuan</h6>
      </div>
      <div class="card-body">
        <?php if ($sql->num_rows == 0) : ?>
          <p>Anda belum melakukan pengajuan.</p>
          <p>Silahkan klik tombol buat pengajuan di bawah dan lakukan pengisian formulir.</p>
        <?php else : ?>
          <p>Berikut adalah data pengajuan pinjaman anda.</p>
        <?php endif; ?>
        <a href="pengajuan.php" class="btn btn-primary mb-3">Buat Pengajuan</a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center align-middle">
                <th>ID Pengajuan</th>
                <th>Nama</th>
                <th>Tanggal Pengajuan</th>
                <th>Data Pemohon</th>
                <th>Data Pekerjaan Pemohon</th>
                <th>Data Penghasilan Pemohon</th>
                <th>Data Permohonan Kredit</th>
                <th>Data Pendukung</th>
                <th>Download Formulir</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $sql->fetch_assoc()) : ?>
                <?php
                $id = $row['id_user'];
                $names = $koneksi->query("SELECT * FROM users WHERE id = $id ");
                $name = $names->fetch_assoc();
                // $users = $koneksi->query("SELECT dokumen1, dokumen2, dokumen3, dokumen4 FROM users WHERE id ='$uid' AND dokumen1 IS NOT NULL AND dokumen2 IS NOT NULL AND dokumen3 IS NOT NULL AND dokumen4 IS NOT NULL");
                $pengajuan = $koneksi->query("SELECT data_pemohon, data_pekerjaan, data_penghasilan, data_permohonan, data_pendukung FROM tab_pengajuan WHERE id_user ='$id' AND data_pemohon IS NOT NULL AND data_pekerjaan IS NOT NULL AND data_penghasilan IS NOT NULL AND data_permohonan IS NOT NULL AND data_pendukung IS NOT NULL");
                if ($pengajuan->fetch_assoc() == null) {
                  $check = false;
                } else {
                  $check = true;
                };
                ?>

                <tr>
                  <td style="width: 5%;" class="text-center"><?= $row['id_pengajuan']; ?></td>
                  <td><?= $name['nama']; ?></td>
                  <td><?= $row['tgl_pengajuan']; ?></td>
                  <td class="text-center align-middle"><i class="fas <?= $row['data_pemohon'] != null ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'; ?>"></i></td>
                  <td class="text-center align-middle"><i class="fas <?= $row['data_pekerjaan'] != null ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'; ?>"></i></td>
                  <td class="text-center align-middle"><i class="fas <?= $row['data_penghasilan'] != null ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'; ?>"></i></td>
                  <td class="text-center align-middle"><i class="fas <?= $row['data_permohonan'] != null ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'; ?>"></i></td>
                  <td class="text-center align-middle"><i class="fas <?= $row['data_pendukung'] != null ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'; ?>"></i></td>
                  <td class="text-center align-middle"><a href="topdf.php?id=<?= $row['id_pengajuan']; ?>&uid=<?= $uid; ?>"><i class="fas <?= $check == true ? 'fa-download text-info' : 'fa-times-circle text-danger'; ?>"></a></i></td>
                  <td class="text-center"><span class="badge <?php echo $row['status'] == 'Ditolak' ?  'bg-danger' : ($row['status'] == 'Diterima' ? 'bg-success' : 'bg-warning'); ?> text-white"><?= $row['status']; ?></span></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <!-- footer -->
  <?php include "footer.php" ?>
  <script src="assets/bootstrap.bundle.min.js"></script>

</body>

</html>