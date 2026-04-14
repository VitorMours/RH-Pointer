<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RH Pointer - Register</title>
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body class="app-layout">
  <?php include __DIR__ . '/layouts/header.php'; ?>
  <main>

    <section class="auth-form" id="register-form">
      <h2 class="form-title">Register</h2>
      <form action="/register" method="POST">
        <?php if (!empty($error)): ?>
          <p class="error-text"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <div class="form-control">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-control">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="check-password">
          <div class="form-control">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div class="form-control">
            <label for="check-password">Check Password:</label>
            <input type="password" id="check-password" name="check-password" required>
          </div>
        </div>
        <button type="submit">Register</button>
      </form>
    </section>
  </main>
</body>
</html>