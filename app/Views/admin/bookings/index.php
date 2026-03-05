<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-end mb-3">
  <div>
    <h3 class="mb-1 fw-semibold">Bookings</h3>
    <div class="small-muted">Daftar booking kendaraan dan status approval.</div>
  </div>
  <div class="d-flex gap-2">
    <a class="btn btn-success" href="/admin/bookings/export">Export CSV</a>
    <a class="btn btn-brand text-white" href="/admin/bookings/create">+ Buat Booking</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table class="table table-striped table-bordered align-middle mb-0">
      <thead>
        <tr>
          <th style="width:70px;">ID</th>
          <th style="width:140px;">Tanggal</th>
          <th>Kendaraan</th>
          <th style="width:140px;">Driver</th>
          <th>Tujuan</th>
          <th style="width:280px;">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($bookings)): ?>
          <tr><td colspan="6" class="text-center small-muted">Belum ada booking.</td></tr>
        <?php endif; ?>

        <?php foreach ($bookings as $b): ?>
          <tr>
            <td><?= $b['id'] ?></td>
            <td><?= date('d M Y', strtotime($b['booking_date'])) ?></td>
            <td><?= esc($b['vehicle_name']) ?> (<?= esc($b['plate_number']) ?>)</td>
            <td><?= esc($b['driver_name']) ?></td>
            <td><?= esc($b['purpose']) ?></td>
            <td>
              <span class="badge <?= $b['final_status']=='APPROVED' ? 'text-bg-success' : ($b['final_status']=='REJECTED' ? 'text-bg-danger' : 'text-bg-warning') ?>">
                <?= esc($b['final_status']) ?>
              </span>
              <span class="small-muted ms-2">L1: <?= esc($b['status_level1']) ?> • L2: <?= esc($b['status_level2']) ?></span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>