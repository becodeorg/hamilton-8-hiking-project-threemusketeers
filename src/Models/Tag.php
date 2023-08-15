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
        $stmt =$this->query("DELETE FROM Tags WHERE id = ?",[$id]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        return $data;
    }
}