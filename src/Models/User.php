<?php

namespace Models;
use Models\Database;
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
        $sql ="UPDATE Users
SET firstName=?, lastName= ?, email= ?
WHERE id=".(int)$userID;

        $stmt = $this->query($sql,
            [$firstName,$lastName,$email]);
        //header('location:');
    }

    public function delete($userID)
    {
        $sql ="DELETE  FROM Users
            WHERE id=".(int)$userID;

        $stmt = $this->query($sql);

    }

}