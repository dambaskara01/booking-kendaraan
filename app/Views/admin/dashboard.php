<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Dashboard Pemakaian Kendaraan</h4>
    <div>
      <a class="btn btn-primary" href="/admin/bookings">Menu Booking</a>
      <a class="btn btn-outline-secondary" href="/logout">Logout</a>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <canvas id="chart"></canvas>
    </div>
  </div>
</div>

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

</body>
</html>