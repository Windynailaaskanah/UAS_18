<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda harus login dulu'); window.location='login.php';</script>";
    exit;
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - KonserX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background-color: #8b4564;
      font-family: Comic Sans MS;
    }
    .full-height {
      min-height: calc(100vh - 56px); /* Kurangi tinggi navbar */
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .hero {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 30px;
      background-color:rgb(248, 230, 244);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }
    .alert {
      background-color:rgb(252, 203, 240);
      color: rgb(170, 87, 126);
    }
    .btn {
      background-color: #fff;
      color:rgb(170, 87, 126);
    }
    .btn:hover {
      background-color: rgb(252, 203, 240);
      color: rgb(170, 87, 126);
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-space-blue fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">KonserKu</a>
      <form action="logout.php" method="POST">
        <button type="submit" class="btn btn-outline-light">Logout</button>
      </form>
    </div>
  </nav>
  <div class="full-height">
    <section class="hero text-center">
    <div class="alert">
      Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>! Anda berhasil login.
    </div>

    <a href="index.html" class="btn">Lihat Event Konser</a>
    <a href="riwayat.php" class="btn ">Riwayat Pembelian Tiket</a>
  </div>
  </section>
</body>
</html>
