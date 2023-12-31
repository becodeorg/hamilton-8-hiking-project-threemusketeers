<?php


namespace App\Models;
use App\Models\Database;
use PDO;

class User extends Database
{
    public function findAll()
    {
        $stmt =$this->query("SELECT * FROM Users");
        $datas = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $datas;
    }

    public function findOneByID($id)
    {

        $stmt =$this->query("SELECT * FROM Users WHERE id =?",[$id]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        return $data;
    }

    public function store($firstName,$lastName,$email,$userID)
    {
        $sql ="UPDATE Users SET firstName=?, lastName= ?, email= ? WHERE id=".(int)$userID;

        $stmt = $this->query($sql,
            [$firstName,$lastName,$email]);
    }

    public function delete($userID)
    {
        $sql ="DELETE  FROM Users
            WHERE id=".(int)$userID;

        $stmt = $this->query($sql);

    }
    public function register_new_user(string $firstName, string $lastName, string $nickname, string $email, string $password){

        $sql = "INSERT INTO Users (firstName, lastName, nickname, email, password) VALUES (?,?,?,?,?)";

        $this->query($sql, [$firstName, $lastName, $nickname, $email, $password]);
        return $this->lastInsertId() ;

    }

    public function find_user($nickname){

        $sql = "SELECT * FROM Users WHERE nickname = ?";
        $stmt = $this->query($sql, [$nickname]);
        $data = $stmt->fetch();
        return $data;
        
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
            'admin'=>0
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



