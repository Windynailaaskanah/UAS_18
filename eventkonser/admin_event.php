<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login dulu'); window.location='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_event'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($conn, "INSERT INTO event (nama_event, tanggal, lokasi, harga)
                                   VALUES ('$nama', '$tanggal', '$lokasi', '$harga')");

    if ($insert) {
        echo "<script>alert('Event berhasil ditambahkan!'); window.location='admin_event.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan event!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Event Konser</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3>Form Tambah Event Konser</h3>

  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nama Event</label>
      <input type="text" name="nama_event" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Lokasi</label>
      <input type="text" name="lokasi" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Harga Tiket</label>
      <input type="number" name="harga" class="form-control" required min="10000">
    </div>
    <button type="submit" class="btn btn-success">Tambah Event</button>
    <a href="dashboard.php" class="btn btn-secondary">← Kembali</a>
  </form>
</div>
</body>
</html>
