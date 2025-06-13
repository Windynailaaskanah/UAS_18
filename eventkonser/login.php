<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - KonserX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-color:#8b4564;
      font-family: Comic Sans MS;
    }
    .login-card {
      background: #fff;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary:focus:active {
      background-color: #732b4c;
      box-shadow: none;
      outline: none;
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
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-4 shadow-sm">
          <h3 class="text-center mb-4">Login Pengguna</h3>
          <form action="proses_login.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
