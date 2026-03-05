<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-end mb-3">
  <div>
    <h3 class="mb-1 fw-semibold">Approvals</h3>
    <div class="small-muted">Booking yang menunggu persetujuan Anda.</div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <?php if(empty($bookings)): ?>
      <div class="text-center small-muted py-4">Tidak ada booking yang menunggu approval.</div>
    <?php else: ?>
      <table class="table table-striped table-bordered align-middle mb-0">
        <thead>
          <tr>
            <th style="width:70px;">ID</th>
            <th style="width:140px;">Tanggal</th>
            <th>Kendaraan</th>
            <th style="width:140px;">Driver</th>
            <th>Tujuan</th>
            <th style="width:190px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bookings as $b): ?>
            <tr>
              <td><?= $b['id'] ?></td>
              <td><?= date('d M Y', strtotime($b['booking_date'])) ?></td>
              <td><?= esc($b['vehicle_name']) ?> (<?= esc($b['plate_number']) ?>)</td>
              <td><?= esc($b['driver_name']) ?></td>
              <td><?= esc($b['purpose']) ?></td>
              <td>
                <div class="d-flex gap-2">
                  <a class="btn btn-success btn-sm" href="/approvals/approve/<?= $b['id'] ?>">Approve</a>
                  <a class="btn btn-danger btn-sm" href="/approvals/reject/<?= $b['id'] ?>" onclick="return confirm('Yakin reject?')">Reject</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>

<?= $this->endSection() ?>