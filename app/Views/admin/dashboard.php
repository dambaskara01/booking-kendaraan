<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="mb-3">
  <h4 class="mb-0">Dashboard Pemakaian Kendaraan</h4>
  <div class="text-muted small">Ringkasan jumlah booking per bulan.</div>
</div>

<div class="card shadow-sm">
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
    data: {
      labels: labels,
      datasets: [{
        label: 'Total Booking per Bulan',
        data: data
      }]
    }
  });
</script>

<?= $this->endSection() ?>