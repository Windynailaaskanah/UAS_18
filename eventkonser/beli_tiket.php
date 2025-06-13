<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login dulu'); window.location='login.php';</script>";
    exit;
}

$username = $_SESSION['user'];

$nama_event = isset($_GET['event']) ? $_GET['event'] : '';
$tanggal_event = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
$harga = isset($_GET['harga']) ? $_GET['harga'] : 150000;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beli Tiket - KonserX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-color:#8b4564;
      font-family: Comic Sans MS;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-primary {
      background-color: #8b4564;
      border: none;
    }

    .btn-primary:hover {
      background-color: #732b4c;
    }

    a {
      color: #8b4564;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="container mt-5">
  <div class="card p-4 shadow-sm">
    <h3 class="mb-4">Form Pembelian Tiket</h3>
    <form action="proses_beli.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Nama Event</label>
    <input type="text" name="nama_event" class="form-control" value="<?= htmlspecialchars($nama_event) ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Jumlah Tiket</label>
    <input type="number" name="jumlah" class="form-control" required min="1">
  </div>
  <div class="mb-3">
    <label class="form-label">Harga Tiket</label>
    <input type="number" name="harga" class="form-control" value="<?= $harga ?>" readonly>
  </div>
  <button type="submit" class="btn btn-primary">Beli Tiket</button>
</form>
  </div>
</div>
</body>
</html>
