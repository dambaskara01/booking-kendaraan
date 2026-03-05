<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Approvals</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Daftar Approval</h4>
    <a class="btn btn-outline-secondary" href="/logout">Logout</a>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body">
      <?php if (empty($bookings)): ?>
        <p class="mb-0">Tidak ada booking yang menunggu persetujuan.</p>
      <?php else: ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Kendaraan</th>
            <th>Driver</th>
            <th>Tujuan</th>
            <th>Aksi</th>
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
              <td>
                <a class="btn btn-success btn-sm" href="/approvals/approve/<?= $b['id'] ?>">Approve</a>
                <a class="btn btn-danger btn-sm" href="/approvals/reject/<?= $b['id'] ?>" onclick="return confirm('Yakin reject?')">Reject</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>