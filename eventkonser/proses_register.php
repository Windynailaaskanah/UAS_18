<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

// Cek apakah username sudah terdaftar
$cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah terdaftar'); window.location='register.php';</script>";
} else {
    $simpan = mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");
    if ($simpan) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "Gagal mendaftar: " . mysqli_error($conn);
    }
}
?>
