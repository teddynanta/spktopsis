<?php
header('Content-Type: application/json');
include "../koneksi.php";
$res = $koneksi->query("SELECT * FROM tab_pengajuan");
$pengajuan = array();
foreach ($res as $data) {
  $pengajuan[] = $data;
}
$res->close();
$koneksi->close();

print json_encode($pengajuan);
