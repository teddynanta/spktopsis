<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4 px-5">
  <div class="container-fluid">
    <a href="home.php"><img src="gambar/logobabelw.png" alt="Company Logo" class="navbar-brand" style="max-width: 50%;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ms-auto me-2 mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link font-weight-bold <?= !isset($_GET['active']) ? 'active' : ''; ?>" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-weight-bold <?= isset($_GET['active']) ? 'active' : ''; ?>" href="pengajuan.php?active=yes">Buat Pengajuan</a>
        </li>
      </ul>
      <a href="logout.php" class="btn btn-outline-danger" type="submit">Logout</a>
    </div>
  </div>
</nav>