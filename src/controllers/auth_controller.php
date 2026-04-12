<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Register.php';

use App\Models\User;
use App\Models\Register;

class AuthController {
    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Lógica de autenticação (substitua pela sua implementação real)
            if ($email === 'admin@empresa.com' && $password === '123456') {
                $_SESSION['user'] = $email;
                header('Location: /../views/dashboard.view.php');
                exit;
            } else {
                $error = 'E-mail ou senha inválidos. Tente novamente.';
            }
        }
        include_once(__DIR__ . '/../views/login.view.php');
    }

    public function register() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Lógica de registro (substitua pela sua implementação real)
            $register = new Register();
            if ($register->registerUser($name, $email, $password)) {
                $_SESSION['user'] = $email;
                header('Location: /');
                exit;
            } else {
                $error = 'Erro ao registrar. Tente novamente.';
            }
        }

        include_once(__DIR__ . '/../views/register.view.php');
    }
}
?>