<nav class="navbar">
  <div class="navbar-brand">
    <?php if(isset($_SESSION['user'])): ?>
      <button id="header-menu" class="material-symbols-outlined">
        menu  
    </button>
    <?php else: ?>
      <h1 class="page-title">RHPointer</h1>
    <?php endif; ?>
  </div>
  <div class="navbar-menu">
    <ul>
      <?php if(isset($_SESSION['user'])): ?>
        <li><a href="/logout">Logout</a></li>
      <?php else: ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Sign in</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>