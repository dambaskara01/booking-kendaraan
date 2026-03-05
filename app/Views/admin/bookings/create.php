<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Buat Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Buat Booking</h4>
    <a class="btn btn-outline-secondary" href="/admin/bookings">Kembali</a>
  </div>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body">
      <form method="post" action="/admin/bookings/store">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label class="form-label">Kendaraan</label>
          <select name="vehicle_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($vehicles as $v): ?>
              <option value="<?= $v['id'] ?>"><?= $v['name'] ?> (<?= $v['plate_number'] ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Driver</label>
          <select name="driver_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($drivers as $d): ?>
              <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Pakai</label>
          <input type="date" name="booking_date" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tujuan / Keperluan</label>
          <input type="text" name="purpose" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Approver Level 1</label>
          <select name="approver1_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($approvers as $a): ?>
              <option value="<?= $a['id'] ?>"><?= $a['name'] ?> (<?= $a['email'] ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Approver Level 2</label>
          <select name="approver2_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($approvers as $a): ?>
              <option value="<?= $a['id'] ?>"><?= $a['name'] ?> (<?= $a['email'] ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <button class="btn btn-primary w-100">Simpan Booking</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>