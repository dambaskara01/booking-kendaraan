<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h4 class="mb-0">List Booking</h4>
    <div class="text-muted small">Daftar booking kendaraan dan status approval.</div>
  </div>
  <div class="d-flex gap-2">
    <a class="btn btn-success" href="/admin/bookings/export">Export CSV</a>
    <a class="btn btn-primary" href="/admin/bookings/create">+ Buat Booking</a>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <table class="table table-bordered table-striped align-middle mb-0">
      <thead>
        <tr>
          <th style="width:70px;">ID</th>
          <th style="width:140px;">Tanggal</th>
          <th>Kendaraan</th>
          <th style="width:140px;">Driver</th>
          <th>Tujuan</th>
          <th style="width:260px;">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($bookings)): ?>
          <tr><td colspan="6" class="text-center text-muted">Belum ada booking.</td></tr>
        <?php endif; ?>

        <?php foreach ($bookings as $b): ?>
          <tr>
            <td><?= $b['id'] ?></td>
            <td><?= date('d M Y', strtotime($b['booking_date'])) ?></td>
            <td><?= esc($b['vehicle_name']) ?> (<?= esc($b['plate_number']) ?>)</td>
            <td><?= esc($b['driver_name']) ?></td>
            <td><?= esc($b['purpose']) ?></td>
            <td>
              <div class="d-flex flex-wrap gap-2 align-items-center">
                <?= status_badge($b['final_status']) ?>
                <span class="text-muted small">L1:</span><?= status_badge($b['status_level1']) ?>
                <span class="text-muted small">L2:</span><?= status_badge($b['status_level2']) ?>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>