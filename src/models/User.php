<?php
declare(strict_types=1);
namespace App\Models;

use App\Database\Database;
use PDO;
use PDOException;
use InvalidArgumentException;
use JsonSerializable;
use DateTime;


/**
 * User model para representar e consultar os usuários no banco de dados.
 */
final class User implements JsonSerializable {

  private DateTime $created_at;
  private DateTime $updated_at;
  private PDO $pdo;
  private const TABLE = "users";

  public function __construct(private string $name, private string $email, private string $password) {
    $this->created_at = new DateTime();
    $this->updated_at = new DateTime();
    $this->pdo = Database::getInstance();
  }

  public function getName(): string { return $this->name; }
  public function getEmail(): string { return $this->email; }
  public function getPassword(): string { return $this->password; }
  public function getCreatedAt(): DateTime { return $this->created_at; }
  public function getUpdatedAt(): DateTime { return $this->updated_at; }

  public function create_user(): ?User {
    try{
      $stmt = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, email, password, created_at, updated_at) 
                                                            VALUES (:name, :email, :password, :created_at, :updated_at)");
      $stmt->execute([
        'name' => $this->name,
        'email' => $this->email,
        'password' => password_hash($this->password, PASSWORD_DEFAULT),
        'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
      ]);
      return $this;
    } catch(PDOException $e){
      throw new PDOException("Error while creating user: " . $e->getMessage());
    }
  }

  public function update_user(): ?User {
    try{
      $this->updated_at = new DateTime();
      $stmt = $this->pdo->prepare("UPDATE " . self::TABLE . 
                                            " SET name = :name, password = :password, updated_at = :updated_at 
                                              WHERE email = :email");
      $stmt->execute([
        'name' => $this->name,
        'email' => $this->email,
        'password' => password_hash($this->password, PASSWORD_DEFAULT),
        'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
      ]);
      return $this;
    }catch(PDOException $e){
      throw new PDOException("Error while updating the user:" . $e->getMessage());
    }
  }

  public static function findByEmail(string $email): ?User {
    try { 
      $stmt = Database::getInstance()->prepare("SELECT * FROM " . self::TABLE . " WHERE email = :email");
      $stmt->execute(['email' => $email]);
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($data) {
        return new User($data['name'], $data['email'], $data['password']);
      }
      return null;
    } catch (PDOException $e) {
      throw new PDOException("Error fetching user: " . $e->getMessage());
    }
  }

  public function jsonSerialize(): array {
    return [
      'name' => $this->name,
      'email' => $this->email,
      'created_at' => $this->created_at->format(DateTime::ATOM),
      'updated_at' => $this->updated_at->format(DateTime::ATOM)
    ];
  }

  public function __toString(): string {
    return "User(name={$this->name}, 
            email={$this->email}, 
            created_at={$this->created_at->format(DateTime::ATOM)}, 
            updated_at={$this->updated_at->format(DateTime::ATOM)})";
  }
}
