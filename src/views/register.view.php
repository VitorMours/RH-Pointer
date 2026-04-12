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
    <h2>Register</h2>
    <form action="/register" method="POST">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Register</button>
    </form>
  </main>
</body>
</html>