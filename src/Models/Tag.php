<?php

namespace Models;
use Models\Database;
class Tag extends Database
{
    public function findAll()
    {
         $stmt =$this->query("SELECT * FROM Tags");
         $datas = $stmt->fetchAll(\PDO::FETCH_OBJ);
         return $datas;
    }
    public function findOneByID($id)
    {

        $stmt =$this->query("SELECT *FROM Tags WHERE id = ?",[$id]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        return $data;

    }


    public function store($name)
    {

        $stmt = $this->query("INSERT INTO Tags
    (name) VALUES (?)",
            [$name]);

    }
    public function update($name,$tagID)
    {
        $sql ="UPDATE Tags
        SET name=?
        WHERE id=".(int)$tagID;

       $this->query($sql,[$name]);

    }

    public function delete(int $id)
    {
      $sql ="DELETE  FROM Tags
            WHERE id= $id";
      $this->query($sql);
    }
}