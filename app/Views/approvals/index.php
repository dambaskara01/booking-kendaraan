<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="mb-3">
  <h4 class="mb-0">Daftar Approval</h4>
  <div class="text-muted small">Booking yang menunggu persetujuan Anda.</div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <?php if (empty($bookings)): ?>
      <p class="mb-0 text-muted">Tidak ada booking yang menunggu persetujuan.</p>
    <?php else: ?>
      <table class="table table-bordered table-striped align-middle mb-0">
        <thead>
          <tr>
            <th style="width:70px;">ID</th>
            <th style="width:140px;">Tanggal</th>
            <th>Kendaraan</th>
            <th style="width:140px;">Driver</th>
            <th>Tujuan</th>
            <th style="width:180px;">Aksi</th>
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