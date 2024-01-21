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
                <th>Status</th>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                  <th>Aksi</th>
                <?php else : ?>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $sql->fetch_assoc()) : ?>
                <?php
                $id = $row['id_user'];
                $names = $koneksi->query("SELECT * FROM users WHERE id = $id ");
                $name = $names->fetch_assoc();
                ?>
                <tr>
                  <td style="width: 5%;" class="text-center"><?= $row['id']; ?></td>
                  <td><?= $name['nama']; ?></td>
                  <td><?= $row['tgl_pengajuan']; ?></td>
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