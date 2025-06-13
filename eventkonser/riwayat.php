<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location='login.php';</script>";
    exit;
}

$username = $_SESSION['user'];
$query = mysqli_query($conn, "SELECT * FROM tiket WHERE username='$username'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pembelian Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-color:#8b4564;
      font-family: Comic Sans MS;
      color: #fff;
    }

  </style>
</head>
<body>
<div class="container mt-5">
  <h3 class="mb-4">Riwayat Pembelian Tiket - <?= htmlspecialchars($username) ?></h3>

  <a href="dashboard.php" class="btn btn-danger mb-3">← Kembali ke Dashboard</a>

  <table class="table table-bordered" >
    <thead class="table-danger">
      <tr>
        <th>No</th>
        <th>Nama Event</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Aksi</th> <!-- Tambahan: kolom untuk tombol hapus -->
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td>{$no}</td>
                <td>" . htmlspecialchars($row['nama_event']) . "</td>
                <td>{$row['jumlah']}</td>
                <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
                <td>
                  <a href='hapus_tiket.php?id=" . $row['id'] . "' class='btn btn-danger btn-outline-light' onclick=\"return confirm('Yakin ingin menghapus tiket ini?');\">Hapus</a>
                </td>
              </tr>";
        $no++;
      }
      if ($no === 1) {
          echo "<tr><td colspan='5' class='text-center'>Belum ada pembelian tiket.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
