<?php
//koneksi
session_start();
include "koneksi.php";
include "head.php";
$uid = $_SESSION['uid'];
?>

<body class="d-flex flex-column h-100">
  <!--navbar navbar-default navbar-custom-->
  <!--menu-->
  <?php include "navbar.php"; ?>
  <div class="container">

  </div>
  <div class="container-xl mx-auto">
    <h3 class="m-0 font-weight-bold text-dark text-center">Form Pengajuan Pinjaman</h3>
    <div class="card shadow mb-4 mt-4">
      <div class="card-header py-3 bg-info">
        <h6 class="m-0 font-weight-bold text-white text-center">Data Permohonan Kredit</h6>
      </div>
      <div class="card-body">
        <p>Silahkan lanjutkan pengisian data.</p>
        <p>Isikan formulir ini dengan sebenar-benarnya.</p>
        <p>Setelah selesai anda akan diberikan formulir cetak berbentuk PDF.</p>
        <br>
        <form action="pk_pemohon.php" method="POST">

          <input type="hidden" id="disabledTextInput" name="iduser" class="form-control" value="<?php echo $_SESSION['uid'] ?>" readonly>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Jumlah Permohonan Kredit (Dalam Rupiah)</label>
            <input type="currency" id="disabledTextInput" name="permohonan" class="form-control" placeholder="Masukan Permohonan Kredit Anda">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Rencana Jangka Waktu</label>
            <select class="form-select" aria-label="Default select example" name="jangka">
              <option selected>Jawaban</option>
              <option value="1">6 Bulan</option>
              <option value="2">1 Tahun - 3 Tahun</option>
              <option value="3">3 Tahun - 5 Tahun</option>
              <option value="4">Lebih dari 5 Tahun</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Tujuan Permohonan Kredit</label>
            <input type="text" id="disabledTextInput" name="tujuan" class="form-control" placeholder="Masukan Tujuan Permohonan Anda">
          </div>

          <button type="submit" class="btn btn-primary">Buat Pengajuan</button>
        </form>
      </div>
    </div>
  </div>

  <!--footer-->
  <?php include "footer.php" ?>

  <!--plugin-->
  <script src="assets/bootstrap.bundle.min.js"></script>
  <script>
    var currencyInput = document.querySelector('input[type="currency"]')
    var currency = 'IDR' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

    // format inital value
    onBlur({
      target: currencyInput
    })

    // bind event listeners
    currencyInput.addEventListener('focus', onFocus)
    currencyInput.addEventListener('blur', onBlur)


    function localStringToNumber(s) {
      return Number(String(s).replace(/[^0-9.,-]+/g, ""))
    }

    function onFocus(e) {
      var value = e.target.value;
      e.target.value = value ? localStringToNumber(value) : ''
    }

    function onBlur(e) {
      var value = e.target.value

      var options = {
        maximumFractionDigits: 0,
        currency: currency,
        style: "currency",
        currencyDisplay: "symbol"
      }

      e.target.value = (value || value === 0) ?
        localStringToNumber(value).toLocaleString(undefined, options) :
        ''
    }
  </script>

</body>

</html>