<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-end mb-3">
  <div>
    <h3 class="mb-1 fw-semibold">Buat Booking</h3>
    <div class="small-muted">Isi data booking dan tentukan approver.</div>
  </div>
  <a class="btn btn-outline-secondary" href="/admin/bookings">Kembali</a>
</div>

<div class="card">
  <div class="card-body">
    <form method="post" action="/admin/bookings/store">
      <?= csrf_field() ?>

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold small">Kendaraan</label>
          <select name="vehicle_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($vehicles as $v): ?>
              <option value="<?= $v['id'] ?>"><?= esc($v['name']) ?> (<?= esc($v['plate_number']) ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold small">Driver</label>
          <select name="driver_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($drivers as $d): ?>
              <option value="<?= $d['id'] ?>"><?= esc($d['name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold small">Tanggal Pakai</label>
          <input type="date" name="booking_date" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold small">Tujuan / Keperluan</label>
          <input type="text" name="purpose" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold small">Approver Level 1</label>
          <select name="approver1_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($approvers as $a): ?>
              <option value="<?= $a['id'] ?>"><?= esc($a['name']) ?> (<?= esc($a['email']) ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold small">Approver Level 2</label>
          <select name="approver2_id" class="form-select" required>
            <option value="">-- pilih --</option>
            <?php foreach ($approvers as $a): ?>
              <option value="<?= $a['id'] ?>"><?= esc($a['name']) ?> (<?= esc($a['email']) ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <button class="btn btn-brand text-white w-100 mt-3">Simpan Booking</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>