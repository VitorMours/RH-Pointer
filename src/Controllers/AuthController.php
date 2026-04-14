<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {

    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if ($email === "" || $password === "") {
                $error = "Email ou senha precisam ser preenchidos.";
                include_once(__DIR__ . '/../views/login.view.php');
                return;
            }
            
            $user = User::findByEmail($email);

            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['user'] = $email;
                    header('Location: /dashboard');
                    exit;
                } else {
                    $error = "Email ou senha incorreta.";
                }
            } else {
                $error = "Usuário não encontrado.";
            }

            include_once(__DIR__ . '/../views/login.view.php');
            return;

        } else {
            include_once(__DIR__ . '/../views/login.view.php');
        }
    }

    public function register() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $check_password = trim($_POST['check-password'] ?? '');

            if ($password === "" || $check_password === "" || $email === "" || $name === "") {
                $error = "Todos os campos devem ser preenchidos.";
                include_once(__DIR__ . '/../views/register.view.php');
                return;
            }

            if ($password !== $check_password) {
                $error = "A senha e contrasenha devem ser iguais.";
                include_once(__DIR__ . '/../views/register.view.php');
                return;
            }

            $user = new User($name, $email, $password);

            if ($user->create_user()) {
                $_SESSION['user'] = $email;
                header('Location: /dashboard');
                exit;
            } else {
                $error = 'Erro ao registrar. Tente novamente.';
            }
        }

        include_once(__DIR__ . '/../views/register.view.php');
    }

    public function logout(): void {
        session_destroy();
        header('Location: /');
        exit;
    }
}