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
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Dokumen 1</th>
                    <th>Dokumen 2</th>
                    <th>Dokumen 3</th>
                    <th>Dokumen 4</th>
                    <th>Dokumen 5</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $uid = $_GET['uid'];
                  $id = $_GET['id'];
                  $users = $koneksi->query("SELECT * FROM users WHERE id = $uid");
                  $user = $users->fetch_assoc();
                  $rows = $koneksi->query("SELECT * FROM tab_pengajuan WHERE id=$id");
                  $row = $rows->fetch_assoc();
                  ?>
                  <tr>
                    <td style="width: 5%;"><?= $user['nama']; ?></td>
                    <td><?= $row['tgl_pengajuan']; ?></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen1']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen2']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen3']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen4']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td class="text-center"><a class="btn btn-sm btn-primary" href="../<?= $user['dokumen5']; ?>"><i class="fas fa-eye"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>