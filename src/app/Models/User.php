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

    public function find_user($nickname){

        $sql = "SELECT * FROM Users WHERE nickname = ?";
        $stmt = $this->query($sql, [$nickname]);
        return $stmt->fetch();
        
    }

    public function find_user_byId($idUser){

        $sql = "SELECT * FROM Users WHERE id = ?";
        $stmt = $this->query($sql, [$idUser]);
        return $stmt->fetch();

    }
    
   public function store_session(string $firstName, string $lastName, string $nickname, $email){

    $_SESSION['user'] = [
        'id' => $this->lastInsertId(),
        'firstName' => $firstName,
        'lastName' => $lastName,
        'nickname' => $nickname,
        'email' => $email,
    ];

   }

   public function change_user_info($idUser, string $firstName, string $lastName, string $nickname, string $email){

        $sql = "UPDATE Users SET firstName = ?, lastName = ?, nickname = ?, email = ? WHERE id = ?";
        $stmt = $this->query($sql, [$firstName, $lastName, $nickname, $email, $idUser]);
        
   }

   public function user_hikes($userId){

        $sql = "SELECT * FROM Hikes WHERE user_id = ?";
        $stmt = $this->query($sql, [$userId]);
        return $stmt->fetchAll();

   }

}

?>