<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RH Pointer - Login</title>
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body class="app-layout">
  <?php include __DIR__ . '/layouts/header.php'; ?>
  <main>
    <section>
    <h2>Log in</h2>
      <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
      <form action="/login" method="POST">
        <div class="form-control">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div  class="form-control">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Log in</button>
      </form>
    </section>
  </main>
</body>
</html>