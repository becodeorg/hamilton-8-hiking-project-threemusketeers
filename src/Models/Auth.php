<?php

namespace Models;
use Models\Database;
use PDO;
class Auth extends Database
{
    public function store($firstName,$lastName,$nickName,$email,$password)
    {
        $sql ="INSERT INTO Users
    (firstName,lastName,nickName,email,password,admin) VALUES (?,?, ?, ?,?,?);";

        $stmt = $this->query($sql,
            [$firstName,$lastName,$nickName,$email,$password,0]);

    }


    public function find($email)
    {
        $stmt = $this->query("SELECT * FROM Users WHERE email = ? ",[$email]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function verification($hikeID)
    {

        $stmt = $this->query("SELECT * FROM Hikes WHERE Hikes.id = ? ",[$hikeID]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}