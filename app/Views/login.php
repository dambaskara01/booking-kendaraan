<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<div class="d-flex align-items-center" style="min-height:100vh; padding:48px 12px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-6 col-xl-5">

        <div class="card">
          <div class="card-body p-4 p-md-5">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="brand-badge" style="background:linear-gradient(135deg, var(--brand), var(--brand2)); border-radius:14px;">BK</div>
              <div>
                <div class="fw-semibold">Booking Kendaraan</div>
                <div class="small-muted">Masuk untuk melanjutkan</div>
              </div>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form method="post" action="/login" id="loginForm">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label class="form-label fw-semibold small">Email</label>
                <input type="email" name="email" class="form-control" placeholder="admin@mail.com" required>
              </div>

              <div class="mb-2">
                <label class="form-label fw-semibold small">Password</label>
                <div class="input-group">
                  <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                  <button type="button" class="btn btn-outline-secondary" id="togglePass">Show</button>
                </div>
              </div>

              <button class="btn btn-brand text-white w-100 mt-3" id="btnSubmit">
                Masuk
              </button>
            </form>

            <div class="mt-4 pt-3 border-top">
              <div class="fw-semibold small mb-2">Akun demo</div>
              <div class="small-muted">
                <div>Admin: <span class="kbd">admin@mail.com</span> / <span class="kbd">password</span></div>
                <div>Approver 1: <span class="kbd">spv@mail.com</span> / <span class="kbd">password</span></div>
                <div>Approver 2: <span class="kbd">mgr@mail.com</span> / <span class="kbd">password</span></div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  const toggle = document.getElementById('togglePass');
  const pass = document.getElementById('password');
  toggle?.addEventListener('click', () => {
    const isPass = pass.type === 'password';
    pass.type = isPass ? 'text' : 'password';
    toggle.textContent = isPass ? 'Hide' : 'Show';
  });
</script>

<?= $this->endSection() ?>