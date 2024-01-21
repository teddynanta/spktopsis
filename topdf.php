<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include "koneksi.php";
$id = $_GET['id'];
$uid = $_GET['uid'];
$sql = $koneksi->query("SELECT * FROM data_pemohon WHERE id_pengajuan = '$id'");
$row = $sql->fetch_assoc();
$sql2 = $koneksi->query("SELECT * FROM data_pekerjaan WHERE id_pengajuan = '$id'");
$row2 = $sql2->fetch_assoc();
$sql3 = $koneksi->query("SELECT * FROM data_penghasilan WHERE id_pengajuan = '$id'");
$row3 = $sql3->fetch_assoc();
$sql4 = $koneksi->query("SELECT * FROM data_permohonan WHERE id_pengajuan = '$id'");
$row4 = $sql4->fetch_assoc();
$namesql = $koneksi->query("SELECT * FROM users WHERE id = $uid");
$name = $namesql->fetch_assoc();
$datenow = new DateTime('now');
$date = $datenow->format('d F Y');
$filename = $id . '-' . $name['nama'];
// var_dump($row);
// var_dump($row2);
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

  .footer {
    border-top: 3px solid black;
    font-size: 10pt;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 90%;
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
  .page-break { 
    page-break-before: always; 
  }

  .ttd {
    margin-top: 50px;
    text-align: right;
    margin-left: auto;
    margin-right: 48px;
  }

  .tgl {
    margin-top: 25px;
    text-align: right;
  }

  .nama {
    margin-top: 25px;
    margin-right: 50px;
    text-align: right;
  }
</style>
</head>

<body>
  <footer>
    <div class="footer">
      <p><i>Formulir ini dibuat secara otomatis oleh sistem</i></p>
    </div>
  </footer>
  <main>
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
      <h4 class="tab-head page-break">DATA PENGHASILAN PEMOHON</h4>
      <table>
        <tr>
          <td>Penghasilan per Bulan</td>
          <td>:</td>
          <td>' . $row3['penghasilan'] . '</td>
        </tr>
        <tr>
          <td>Tunjangan (Sertifikasi)</td>
          <td>:</td>
          <td>' . $row3['sertifikasi'] . '</td>
        </tr>
        <tr>
          <td>Tunjangan (TPP)</td>
          <td>:</td>
          <td>' . $row3['tpp'] . '</td>
        </tr>
        <tr>
          <td>Tunjangan Lainnya</td>
          <td>:</td>
          <td>' . $row3['lainnya'] . '</td>
        </tr>
        <tr>
          <td>No. Rekening</td>
          <td>:</td>
          <td>' . $row3['norek'] . '</td>
        </tr>
      </table>
      <h4 class="tab-head">DATA PERMOHONAN KREDIT</h4>
      <table>
        <tr>
          <td>Jumlah Permohonan kredit</td>
          <td>:</td>
          <td>' . $row4['permohonan'] . '</td>
        </tr>
        <tr>
          <td>Rencana Jangka Waktu</td>
          <td>:</td>
          <td>' . $row4['jangka'] . '</td>
        </tr>
        <tr>
          <td>Tujuan Permohonan Kredit</td>
          <td>:</td>
          <td>' . $row4['tujuan'] . '</td>
        </tr>
      </table>
    </div>
    <div class="tgl">
      <p>Lubuklinggau, ' . $date . '</p>
    </div>
    <div class="ttd">
      
    </div>
    <div class="nama">
      <p>' . $name['nama'] . '</p>
    </div>
  </main>
  <footer>
    <div class="footer">
      <p><i>Formulir ini dibuat secara otomatis oleh sistem</i></p>
    </div>
  </footer>
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
$dompdf->stream($filename, array("Attachment" => 0));

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
