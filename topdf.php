<?php
session_start();
include "koneksi.php";
$sql = $koneksi->query("SELECT * FROM data_pemohon ORDER BY tgl_submit DESC LIMIT 1");
$row = $sql->fetch_assoc();
$sql2 = $koneksi->query("SELECT * FROM data_pekerjaan ORDER BY tgl_submit DESC LIMIT 1");
$row2 = $sql2->fetch_assoc();
var_dump($row2);
// var_dump($row);
include "vendor/autoload.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

$html = '<style>
  body {
    font-family: Arial, sans-serif;
    margin: 40px;
  }

  .letterhead {
    padding-bottom: 20px;
    margin-bottom: 20px;
    overflow: hidden;
  }

  .logo {
    max-width: 100px;
    float: left;
    margin-right: 20px;
  }

  .company-info {
    margin-top: 10px;
    overflow: hidden;
  }

  .company-info p {
    margin: 5px 0;
  }

  .foto {
    margin-left: auto;
    border: 5px solid black;
    width: 90px;
    height: 120px;
    margin-top: -100px;
  }

  .foto p {
    text-align: center;
    margin-top: 50%;
    margin-bottom: auto;
  }

  .tab-head {
    background-color: black;
    color: white;
    text-align: center;
    padding: 5px;
  }
</style>
</head>

<body>
  <div class="letterhead">
    <img class="logo" src="/gambar/logo.png" alt="Company Logo">
    <div class="company-info">
      <h2>Formulir Pengajuan Kredit</h2>
      <p>No. Pengajuan : ' . $row['id_pengajuan'] . '</p>
    </div>
    <div class="foto">
      <p>foto anda 3x4</p>
    </div>
  </div>

  <div class="content">
    <h4 class="tab-head">DATA PEMOHON</h4>
    <table>
      <tr>
        <td>Nama calon peminjam sesuai KTP</td>
        <td>:</td>
        <td>' . $row['nama'] . '</td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td>' . $row['bdate'] . '</td>
      </tr>
      <tr>
        <td>Kewarganegaraan</td>
        <td>:</td>
        <td>' . $row['warga'] . '</td>
      </tr>
      <tr>
        <td>No. KTP</td>
        <td>:</td>
        <td>' . $row['nik'] . '</td>
      </tr>
      <tr>
        <td>No. NPWP</td>
        <td>:</td>
        <td>' . $row['npwp'] . '</td>
      </tr>
      <tr>
        <td>Nama Gadis Ibu Kandung</td>
        <td>:</td>
        <td>' . $row['ibu'] . '</td>
      </tr>
      <tr>
        <td>Status Pernikahan</td>
        <td>:</td>
        <td>' . $row['nikah'] . '</td>
      </tr>
      <tr>
        <td>Nama Istri/Suami</td>
        <td>:</td>
        <td>' . $row['pnama'] . '</td>
      </tr>
      <tr>
        <td>Tanggal Lahir Istri/Suami</td>
        <td>:</td>
        <td>' . $row['pbdate'] . '</td>
      </tr>
      <tr>
        <td>Alamat Sesuai KTP</td>
        <td>:</td>
        <td>' . $row['alamat'] . '</td>
      </tr>
      <tr>
        <td>Alamat Sesuai Domisili</td>
        <td>:</td>
        <td>' . $row['alamatdom'] . '</td>
      </tr>

      <tr>
        <td>No. Telepon yang Aktif</td>
        <td>:</td>
        <td>' . $row['notel'] . '</td>
      </tr>
    </table>
    <h4 class="tab-head">DATA PEKERJAAN PEMOHON</h4>
    <table>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>' . $row2['pekerjaan'] . '</td>
      </tr>
      <tr>
        <td>NIP</td>
        <td>:</td>
        <td>' . $row2['NIP'] . '</td>
      </tr>
      <tr>
        <td>Nama Instansi/Dinas/Perusahaan</td>
        <td>:</td>
        <td>' . $row2['perusahaan'] . '</td>
      </tr>
      <tr>
        <td>Lama Bekerja</td>
        <td>:</td>
        <td>' . $row2['lamakerja'] . '</td>
      </tr>
      <tr>
        <td>Alamat Kantor</td>
        <td>:</td>
        <td>' . $row2['alamatkantor'] . '</td>
      </tr>
      <tr>
        <td>No. Telepon Kantor</td>
        <td>:</td>
        <td>' . $row2['notelkantor'] . '</td>
      </tr>
      <tr>
        <td>Nama Atasan</td>
        <td>:</td>
        <td>' . $row2['atasan'] . '</td>
      </tr>
      <tr>
        <td>Jabatan Atasan</td>
        <td>:</td>
        <td>' . $row2['jab_atasan'] . '</td>
      </tr>
    </table>
  </div>
</body>';


// $html = file_get_contents($html);
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'Portrait');

// Render the HTML as PDF
$dompdf->render();
ob_end_clean();
// Output the generated PDF to Browser
$dompdf->stream('file', array("Attachment" => 0));

// //menyertakan file fpdf, file fpdf.php di dalam folder FPDF yang diekstrak
// include "vendor/fpdf/fpdf.php";

// //membuat objek baru bernama pdf
// $pdf = new FPDF();
// //membuat halaman baru
// $pdf->AddPage();
// //menyeting jenis font, bold, dan ukuran
// $pdf->SetFont('Arial', 'B', 16);
// //menyeting tata letak tulisan
// $pdf->Cell(10, 50, 'Hello World!');
// $pdf->Cell(5, 70, 'Hello World!');
// //menampilkan tulisan
// $pdf->Output();
