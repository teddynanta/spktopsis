<?php
//koneksi
include "header.php";

$tampil = $koneksi->query("SELECT b.nama_alternatif,c.nama_kriteria,a.nilai,c.bobot,c.status
      FROM
        tab_topsis a
        JOIN
          tab_alternatif b USING(id_alternatif)
        JOIN
          tab_kriteria c USING(id_kriteria)");

$data      = array();
$kriterias = array();
$bobot     = array();
$nilai_kuadrat = array();
$status = array();

if ($tampil) {
  while ($row = $tampil->fetch_object()) {
    if (!isset($data[$row->nama_alternatif])) {
      $data[$row->nama_alternatif] = array();
    }
    if (!isset($data[$row->nama_alternatif][$row->nama_kriteria])) {
      $data[$row->nama_alternatif][$row->nama_kriteria] = array();
    }
    if (!isset($nilai_kuadrat[$row->nama_kriteria])) {
      $nilai_kuadrat[$row->nama_kriteria] = 0;
    }
    $bobot[$row->nama_kriteria] = $row->bobot;
    $data[$row->nama_alternatif][$row->nama_kriteria] = $row->nilai;
    $nilai_kuadrat[$row->nama_kriteria] += pow($row->nilai, 2);
    $kriterias[] = $row->nama_kriteria;
    $status[$row->nama_kriteria] = $row->status;
  }
}

$kriteria     = array_unique($kriterias);
$jml_kriteria = count($kriteria);

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
            <h1 class="h3 mb-0 text-gray-800">Hasil TOPSIS</h1>
          </div>
        </div>

        <!-- Content Row Evaluation Matrix -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Evaluation Matrix (x<sub>ij</sub>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach ($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for ($n = 1; $n <= $jml_kriteria; $n++)
                      echo "<th>K$n</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($data as $nama => $krit) {
                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A$i</th>
                      <td>$nama</td>";
                    foreach ($kriteria as $k) {
                      echo "<td align='center'>$krit[$k]</td>";
                    }
                    echo "</tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Evaluation Matrix -->

        <!-- Content Row Rating Kinerja Ternomalisasi -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rating Kinerja Ternormalisasi (r<sub>ij</sub>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach ($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for ($n = 1; $n <= $jml_kriteria; $n++)
                      echo "<th>K$n</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($data as $nama => $krit) {
                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach ($kriteria as $k) {
                      echo
                      "<td align='center'>" . round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) .
                        "</td>";
                    }
                    echo
                    "</tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Rating Kinerja Ternomalisasi -->

        <!-- Content Row Rating Bobot Ternomalisasi -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rating Bobot Ternormalisasi(y<sub>ij</sub>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach ($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for ($n = 1; $n <= $jml_kriteria; $n++)
                      echo "<th>K$n</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  $y = array();
                  foreach ($data as $nama => $krit) {
                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach ($kriteria as $k) {
                      $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) * $bobot[$k];
                      echo "<td align='center'>" . $y[$k][$i - 1] . "</td>";
                    }
                    echo
                    "</tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Rating Bobot Ternomalisasi -->

        <!-- Content Row Solusi Ideal Positif -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solusi Ideal positif (A<sup>+</sup>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach ($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for ($n = 1; $n <= $jml_kriteria; $n++)
                      echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $yplus = array();
                    foreach ($kriteria as $k) {
                      $yplus[$k] = ($status[$k] == 'Benefit' ? max($y[$k]) : min($y[$k]));

                      echo "<th>$yplus[$k]</th>";
                    }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Solusi Ideal Positif -->

        <!-- Content Row Solusi Ideal Negatif -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solusi Ideal negatif (A<sup>-</sup>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach ($kriteria as $k)
                      echo "<th>{$k}</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for ($n = 1; $n <= $jml_kriteria; $n++)
                      echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $ymin = array();
                    foreach ($kriteria as $k) {
                      $ymin[$k] = ($status[$k] == 'Cost' ? max($y[$k]) : min($y[$k]));
                      echo "<th>{$ymin[$k]}</th>";
                    }

                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Solusi Ideal Negatif -->

        <!-- Content Row Jarak Positif -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jarak positif (D<sub>i</sub><sup>+</sup>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>D<sup>+</sup></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  $dplus = array();
                  foreach ($data as $nama => $krit) {
                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach ($kriteria as $k) {
                      if (!isset($dplus[$i - 1])) $dplus[$i - 1] = 0;
                      $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
                    }
                    echo "<td>" . round(sqrt($dplus[$i - 1]), 4) . "</td>
                    </tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Jarak Positf -->

        <!-- Content Row Jarak Negatif -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jarak negatif (D<sub>i</sub><sup>-</sup>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>D<sup>-</sup>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  $dmin = array();
                  foreach ($data as $nama => $krit) {
                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach ($kriteria as $k) {
                      if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                      $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
                    }
                    echo "<td>" . round(sqrt($dmin[$i - 1]), 4) . "</td>
                    </tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Jarak Negatif -->

        <!-- Content Row Nilai Preferensi -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nilai Preferensi(V<sub>i</sub>)</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>V<sub>i</sub></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  $V = array();
                  $Y = array();
                  $Z = array();
                  $hasilakhir = array();


                  foreach ($data as $nama => $krit) {
                    echo "<tr>
                            <td>" . (++$i) . "</td>
                            <th>A{$i}</th>
                            <td>{$nama}</td>";
                    foreach ($kriteria as $k) {
                      $V[$i - 1] = round(sqrt($dmin[$i - 1]), 4) / (round(sqrt($dmin[$i - 1]), 4) + round(sqrt($dplus[$i - 1]), 4));
                    }
                    echo "<td>{$V[$i - 1]}</td></tr>\n";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Content Row Nilai Preferensi -->

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