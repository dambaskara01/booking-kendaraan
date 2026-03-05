<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Booking Kendaraan</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm mt-5">
        <div class="card-body p-4">
          <h4 class="mb-3 text-center">Login</h4>

          <!-- tampilkan pesan error dari session flash -->
          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>

          <form method="post" action="/login">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="contoh: admin@mail.com" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Masuk</button>
          </form>

          <hr>

          <div class="small text-muted">
            Akun demo:
            <ul class="mb-0">
              <li>Admin: admin@mail.com / password</li>
              <li>Approver 1: spv@mail.com / password</li>
              <li>Approver 2: mgr@mail.com / password</li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>