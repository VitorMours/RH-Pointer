<?php

  namespace App\Database;
  use PDO;
  use PDOException;

  final class Database {
    private static ?PDO $instance = null;

    private function __construct() {
      // Conexão com o banco de dados (substitua pelos seus dados)
      $dsn = 'mysql:host=db;port=3306;dbname=ponto_eletronico;charset=utf8mb4';
      $username = 'dev_user';
      $password = 'dev123';
      try {
        self::$instance = new PDO($dsn, $username, $password);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
      }
    }

    public static function getInstance(): PDO {
      if (self::$instance === null) {
        new Database();
      }
      return self::$instance;
    }
  }
?>