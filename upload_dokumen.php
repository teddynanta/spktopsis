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
    <h2 class="text-center">Profil</h2>

    <div class="row">
      <div class="col-lg-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            Data Diri
          </div>
          <!-- <div class="row"> -->
          <div class="panel-body">
            <!-- Tab panes -->
            <div class="tab-content row">
              <div class="col-lg-12 col-md-6">
                <!--tabel alternatif-->
                <p>Silahkan upload dokumen kelengkapan apabila ada yang belum lengkap.</p>
                <i class="fas fa-upload text-warning"></i> : menandakan anda belum mengupload file, klik icon untuk mengupload.<br>
                <i class="fas fa-check-circle text-success my-2"></i> : menandakan anda sudah mengupload file, klik icon untuk melihat berkas anda.
                <div class="table-responsive mb-5">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">ID User</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Fotocopy KTP</th>
                        <th class="text-center wrap-text">Fotocopy Surat Nikah & Kartu Keluarga</th>
                        <th class="text-center">Slip Gaji Terakhir</th>
                        <th class="text-center">Jaminan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $uid = $_SESSION['uid'];
                      $users = $koneksi->query("SELECT * FROM users WHERE id = '$uid'");
                      // $user = $users->fetch_array();
                      while ($user = $users->fetch_array()) {
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $user['id'] ?></td>
                          <td><?php echo $user['nama'] ?></td>
                          <td class="text-center"><?php echo ($user['dokumen1'] == null) ? "<a class='fas fa-upload text-warning' href='tambahdokumen.php?id=dokumen1&nama=Fotocopy+KTP'></a>" : "<i class='fas fa-check-circle text-success my-2'></i> <a class='fas fa-eye text-secondary' href='" . $user['dokumen1'] . "'></a> <a class='fas fa-edit text-warning' href='editdokumen.php?id=dokumen1&nama=Fotocopy+KTP'></a>"; ?></td>

                          <td class="text-center"><?php echo ($user['dokumen2'] == null) ? "<a class='fas fa-upload text-warning' href='tambahdokumen.php?id=dokumen2&nama=Fotocopy+Surat+Nikah+dan+Kartu+Keluarga'></a>" : "<i class='fas fa-check-circle text-success my-2'></i> <a class='fas fa-eye text-secondary' href='" . $user['dokumen2'] . "'></a> <a class='fas fa-edit text-warning' href='editdokumen.php?id=dokumen2&nama=Fotocopy+Surat+Nikah+dan+Kartu+Keluarga'></a>"; ?></td>

                          <td class="text-center"><?php echo ($user['dokumen3'] == null) ? "<a class='fas fa-upload text-warning' href='tambahdokumen.php?id=dokumen3&nama=Slip+Gaji+Terakhir'></a>" : "<i class='fas fa-check-circle text-success my-2'></i> <a class='fas fa-eye text-secondary' href='" . $user['dokumen3'] . "'></a> <a class='fas fa-edit text-warning' href='editdokumen.php?id=dokumen3&nama=Slip+Gaji+Terakhir'></a>"; ?></td>

                          <td class="text-center"><?php echo ($user['dokumen4'] == null) ? "<a class='fas fa-upload text-warning' href='tambahdokumen.php?id=dokumen4&nama=Jaminan'></a>" : "<i class='fas fa-check-circle text-success my-2'></i> <a class='fas fa-eye text-secondary' href='" . $user['dokumen4'] . "'></a> <a class='fas fa-edit text-warning' href='editdokumen.php?id=dokumen4&nama=Jaminan'></a>"; ?></td>

                        </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
                <!--tabel alternatif-->
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
  <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>