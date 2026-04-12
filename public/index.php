<?php
session_start();

require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/controllers/home_controller.php';
require_once __DIR__ . '/../src/controllers/auth_controller.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');

switch ($uri) {
    case '':
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/login':
        $controller = new AuthController();
        $controller->login();
        break;
    case '/register':
        $controller = new AuthController();
        $controller->register();
        break;
    default:
        http_response_code(404);
        echo '<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>404 - Página não encontrada</title></head><body><h1>404</h1><p>Página não encontrada.</p></body></html>';
        break;
}
?>