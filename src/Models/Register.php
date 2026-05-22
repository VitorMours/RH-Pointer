<?php
namespace App\Models;

use App\Models\User;
use App\Database\Database;

class Register {


    private PDO $pdo;
    private const TABLE = "registers";

    public function __construct(private User $user) {
        $this->pdo = Database::getInstance();   
    }


    public function registerUser($name, $email, $password) {
        return true; // Simula sucesso
    }
}
?>