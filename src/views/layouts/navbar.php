<nav class="navbar">
  <div class="navbar-brand">
    <h1 class="page-title">RHPointer</h1>
  </div>
  <div class="navbar-menu">
    <ul>
      <?php if(isset($_SESSION['user'])): ?>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/logout">Logout</a></li>
      <?php else: ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Sign in</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>