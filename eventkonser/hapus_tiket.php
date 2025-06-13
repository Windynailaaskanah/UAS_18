<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login dahulu'); window.location='login.php';</script>";
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $username = $_SESSION['user'];

    // Debug bantuan (sementara)
    // echo "ID: $id - USER: $username";

    $cek = mysqli_query($conn, "SELECT * FROM tiket WHERE id=$id AND username='$username'");
    if (!$cek) {
        die("Query cek error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($cek) > 0) {
        $delete = mysqli_query($conn, "DELETE FROM tiket WHERE id=$id");
        if ($delete) {
            echo "<script>alert('Tiket berhasil dihapus'); window.location='riwayat.php';</script>";
        } else {
            echo "Gagal menghapus tiket: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Tiket tidak ditemukan atau bukan milik Anda'); window.location='riwayat.php';</script>";
    }
} else {
    echo "<script>window.location='riwayat.php';</script>";
}
