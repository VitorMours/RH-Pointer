<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RH Pointer - Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
    <link rel="stylesheet" href="/assets/styles.css">
    <script
      src="https://code.jquery.com/jquery-4.0.0.js"
      integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
      crossorigin="anonymous">
    </script>
  </head>
  <body class="app-layout">
    <?php include __DIR__ . '/layouts/header.php'; ?>

    <div id="drawer-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:999;"></div>

    <div class="drawer" id="side-drawer">
      <button class="close-btn" id="btn-close">&times;</button>
      <h2>Menu Lateral</h2>
      <ul>
        <li><a href="#">Início</a></li>
        <li><a href="#">Perfil (Usuário: <?php echo "Admin"; ?>)</a></li>
        <li><a href="#">Configurações</a></li>
        <li><a href="#">Sair</a></li>
      </ul>
    </div>


  </body>
  <script>
    $(document).ready( function () {
      $('#header-menu').on('click', function () {
        $('#side-drawer').addClass('open');
        $('#drawer-overlay').fadeIn(300); // Efeito suave no fundo
      });

      function fecharDrawer() {
        $('#side-drawer').removeClass('open');
        $('#drawer-overlay').fadeOut(300);
      }

      $('#btn-close').on('click', fecharDrawer);
      $('#drawer-overlay').on('click', fecharDrawer);
      
    });    
  </script>
</html>