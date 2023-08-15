<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Database;
use PDO;

class User extends Database
{
    public function register_new_user(string $firstName, string $lastName, string $nickname, string $email, string $password){

        $sql = "INSERT INTO Users (firstName, lastName, nickname, email, password) VALUES (?,?,?,?,?)";

        $this->query($sql, [$firstName, $lastName, $nickname, $email, $password]);

    }

    // public function login_user(string $username){
    //     $sql = "SELECT * FROM users WHERE username = ?";
    //     $stmt = $this->query($sql, [$username]);
    //     return $stmt->fetch();
    // }
    
   public function store_session(string $firstName, string $lastName, string $nickname, $email){
    $_SESSION['user'] = [
        'id' => $this->lastInsertId(),
        'firstName' => $firstName,
        'lastName' => $lastName,
        'nickname' => $nickname,
        'email' => $email,
    ];
   }
}

?>