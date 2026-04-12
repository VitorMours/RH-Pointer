<?php

namespace App\Models;

use App\models\Register;
use Datetime;


/**
 * User class to represent the user in the system and in the database 
 * @author Joao Vitor 
 * @version 1.0 
 * @since 2026-04-09
 */

class User {

  private DateTime $created_at;
  private DateTime $updated_at;

  public function __construct(
    private string $name,
    private string $email,
    private string $password
  ) {
    $this->created_at = new DateTime('now');
    $this->updated_at = new DateTime('now');
  }

  


  public function getCreatedAt(): string {
    return $this->created_at->format("Y-m-d H:i:s");
  }
  public function getUpdatedAt(): string {
    return $this->updated_at->format("Y-m-d H:i:s");
  }
}
