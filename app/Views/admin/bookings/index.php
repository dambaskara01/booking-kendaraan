<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">List Booking</h4>
    <div>
      <a class="btn btn-success" href="/admin/bookings/export">Export CSV</a>
      <a class="btn btn-primary" href="/admin/bookings/create">+ Buat Booking</a>
      <a class="btn btn-outline-secondary" href="/logout">Logout</a>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Kendaraan</th>
            <th>Driver</th>
            <th>Tujuan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bookings as $b): ?>
            <tr>
              <td><?= $b['id'] ?></td>
              <td><?= $b['booking_date'] ?></td>
              <td><?= $b['vehicle_name'] ?> (<?= $b['plate_number'] ?>)</td>
              <td><?= $b['driver_name'] ?></td>
              <td><?= $b['purpose'] ?></td>
              <td><?= $b['final_status'] ?> (L1: <?= $b['status_level1'] ?>, L2: <?= $b['status_level2'] ?>)</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</body>
</html>