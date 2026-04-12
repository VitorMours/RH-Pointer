<?php
  class Database {

    private $server = "localhost"; 
    private string $port = "3306";
    private string $username = "root";
    private string $password = "";
    private string $database = "ponto_eletronico";

    public function create_connection() {
      $connection = new mysqli($this->server, $this->username, $this->password, $this->database, $this->port);

      if($connection->connect_error){
        die("Database connection failed: ". $connection->connect_error);
      }
      return $connection;
    }

    public function executeQuery($sql){
      $result = $this->create_connection();

      if($result->query($sql) === TRUE){
        return true;
      } else {
        echo "Error executing query: " . $result->error;
        return false;
      }
    }
  }
?>