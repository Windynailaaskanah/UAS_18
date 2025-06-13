<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda harus login dulu'); window.location='login.php';</script>";
    exit;
}

$username = $_SESSION['user'];
$nama_event = $_POST['nama_event'];
$jumlah = $_POST['jumlah'];
$harga = 150000;
$total_harga = $jumlah * $harga;

$query = mysqli_query($conn, "INSERT INTO tiket (username, nama_event, jumlah, total_harga)
          VALUES ('$username', '$nama_event', $jumlah, $total_harga)");

if ($query) {
    echo "<script>alert('Tiket berhasil dibeli!'); window.location='dashboard.php';</script>";
} else {
    echo "Gagal beli tiket: " . mysqli_error($conn);
}
?>
