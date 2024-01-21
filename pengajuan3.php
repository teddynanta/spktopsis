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
      <div class="card-header py-3 bg-warning">
        <h6 class="m-0 font-weight-bold text-black text-center">Data Penghasilan Pemohon</h6>
      </div>
      <div class="card-body">
        <p>Silahkan lanjutkan pengisian data.</p>
        <p>Isikan formulir ini dengan sebenar-benarnya.</p>
        <p>Setelah selesai anda akan diberikan formulir cetak berbentuk PDF.</p>
        <br>
        <form action="pp_pemohon.php" method="POST">

          <input type="hidden" id="disabledTextInput" name="iduser" class="form-control" value="<?php echo $_SESSION['uid'] ?>" readonly>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Penghasilan Per Bulan (Sesuai Dengan Slip Gaji)</label>
            <input type="currency" id="disabledTextInput" name="penghasilan" class="form-control" placeholder="Masukan Penghasilan Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Tunjangan (Sertifikasi)</label>
            <input type="currency2" id="disabledTextInput" name="sertifikasi" class="form-control" placeholder="Masukan Tunjangan Sertifikasi Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Tunjangan (TPP)</label>
            <input type="currency3" id="disabledTextInput" name="tpp" class="form-control" placeholder="Masukan Tunjangan TPP Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Tunjangan Lainnya</label>
            <input type="currency4" id="disabledTextInput" name="lainnya" class="form-control" placeholder="Masukan Tunjangan Anda">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">No. Rekening Tabungan</label>
            <input type="text" id="disabledTextInput" name="norek" class="form-control" placeholder="Masukan No. Rekening Anda">
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
  <script>
    var currencyInput = document.querySelector('input[type="currency2"]')
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
  <script>
    var currencyInput = document.querySelector('input[type="currency3"]')
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
  <script>
    var currencyInput = document.querySelector('input[type="currency4"]')
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