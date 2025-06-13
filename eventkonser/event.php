<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login dahulu'); window.location='login.php';</script>";
    exit;
}

// Pencarian
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$query = mysqli_query($conn, "SELECT * FROM event WHERE nama_event LIKE '%$cari%' ORDER BY tanggal ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Event Konser</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3>Daftar Event Konser</h3>
  <form class="d-flex mb-3" method="GET">
    <input type="text" name="cari" class="form-control me-2" placeholder="Cari nama event..." value="<?= htmlspecialchars($cari) ?>">
    <button class="btn btn-primary" type="submit">Cari</button>
  </form>

  <table class="table table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama Event</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = mysqli_fetch_assoc($query)) {
          echo "<tr>
                  <td>$no</td>
                  <td>{$row['nama_event']}</td>
                  <td>{$row['tanggal']}</td>
                  <td>{$row['lokasi']}</td>
                  <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                  <td>
                    <a href='beli_tiket.php?event=" . urlencode($row['nama_event']) . "&tanggal=" . $row['tanggal'] . "&harga=" . $row['harga'] . "' class='btn btn-success btn-sm'>Beli Tiket</a>
                  </td>
                </tr>";
          $no++;
      }

      if ($no === 1) {
          echo "<tr><td colspan='6' class='text-center'>Event tidak ditemukan.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <a href="dashboard.php" class="btn btn-secondary">← Kembali ke Dashboard</a>
</div>
</body>
</html>
