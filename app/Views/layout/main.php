<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Booking Kendaraan') ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/app.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container container-narrow">
    <a class="navbar-brand d-flex align-items-center gap-2 fw-semibold" href="<?= session('role') === 'admin' ? '/admin/dashboard' : '/approvals' ?>">
      <span class="brand-badge">BK</span>
      Booking Kendaraan
    </a>

    <?php if (session()->get('logged_in')): ?>
      <div class="ms-auto d-flex align-items-center gap-2">
        <span class="text-white-50 small d-none d-md-inline">
          <?= esc(session('name')) ?> (<?= esc(session('role')) ?>)
        </span>

        <?php if (session('role') === 'admin'): ?>
          <a class="btn btn-light btn-sm" href="/admin/dashboard">Dashboard</a>
          <a class="btn btn-light btn-sm" href="/admin/bookings">Bookings</a>
        <?php else: ?>
          <a class="btn btn-light btn-sm" href="/approvals">Approvals</a>
        <?php endif; ?>

        <a class="btn btn-outline-light btn-sm" href="/logout">Logout</a>
      </div>
    <?php endif; ?>
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

  <div class="text-center small-muted mt-4">
    © <?= date('Y') ?> Booking Kendaraan • CodeIgniter 4
  </div>
</main>

</body>
</html>