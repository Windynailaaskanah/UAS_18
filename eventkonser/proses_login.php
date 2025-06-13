<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['username'];
    echo "<script>('Login berhasil'); window.location='dashboard.php';</script>";
} else {
    echo "<script>alert('Username atau password salah'); window.location='login.php';</script>";
}
?>
