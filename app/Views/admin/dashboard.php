<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-end mb-3">
  <div>
    <h3 class="mb-1 fw-semibold">Dashboard</h3>
    <div class="small-muted">Ringkasan jumlah booking per bulan.</div>
  </div>
</div>

<div class="card">
  <div class="card-header fw-semibold">Total Booking per Bulan</div>
  <div class="card-body">
    <canvas id="chart"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = <?= json_encode($labels) ?>;
  const data = <?= json_encode($data) ?>;

  new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: { labels, datasets: [{ label: 'Total Booking', data }] }
  });
</script>

<?= $this->endSection() ?>