<!DOCTYPE html>
<html>
<body>
  <?php if (session()->get('error')): ?>
    <p><?= session()->get('error') ?></p>
  <?php endif; ?>
  <div class="login-container">
    <form method="post" action="<?= base_url('login') ?>">
      <img style="justify-content: center;" src="<?= base_url('assets/pictures/LOGO SMKN 10 MAKASSAR.png'); ?>" alt="Profile Picture" class="profile-img">
      <h4 style="margin-bottom: 20px; text-align: center">Selamat Datang</h4>
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button class="btn btn-primary btn-block" style="border-radius: 10px">Login</button>
      <div class="register-link" style="margin-top: 10px">
        Belum punya akun? <a href="#">Daftar</a>
      </div>
    </form>
  </div>

  <!-- Add Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>