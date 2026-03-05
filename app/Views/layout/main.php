<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Booking Kendaraan') ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container-narrow { max-width: 1100px; }
  </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container container-narrow">
    <a class="navbar-brand fw-semibold" href="<?= session('role') === 'admin' ? '/admin/dashboard' : '/approvals' ?>">
      Booking Kendaraan
    </a>

    <div class="ms-auto d-flex align-items-center gap-2">
      <?php if (session()->get('logged_in')): ?>
        <span class="text-white-50 small">
          <?= esc(session('name')) ?> (<?= esc(session('role')) ?>)
        </span>

        <?php if (session('role') === 'admin'): ?>
          <a class="btn btn-sm btn-light" href="/admin/dashboard">Dashboard</a>
          <a class="btn btn-sm btn-light" href="/admin/bookings">Bookings</a>
        <?php else: ?>
          <a class="btn btn-sm btn-light" href="/approvals">Approvals</a>
        <?php endif; ?>

        <a class="btn btn-sm btn-outline-light" href="/logout">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<main class="container container-narrow py-4">
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?= $this->renderSection('content') ?>
</main>

</body>
</html>