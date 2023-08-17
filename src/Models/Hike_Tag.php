<?php

namespace Models;
use Models\Database;
class Hike_Tag extends Database
{
    public function deleteTag($tagID)
    {
        $sql = "DELETE FROM Hikes_has_tags WHERE tag = $tagID";
        $this->query($sql);
    }

    public function deleteHike($hikeID)
    {
        $sql = "DELETE FROM Hikes_has_tags WHERE hike = $hikeID";
        $this->query($sql);
    }

    public function store($array,$hikeID)
    {
        foreach ($array as $value)
        {
            $sql ="INSERT INTO Hikes_has_tags
                 (hike,tag) VALUES (?, ?);";
            $this->query($sql,[$hikeID,$value]);

        }

    }

    public function update ($array,$hikeID)
    {
            $sql ="DELETE FROM Hikes_has_tags
            WHERE hike = ?;";
            $stmt =$this->query($sql,[$hikeID]);
            $this->store($array,$hikeID);
    }

    public function find($hikeID)
    {

        $sql = "SELECT * FROM Hikes_has_tags INNER JOIN Tags on Tags.id = Hikes_has_tags.tag WHERE hike = $hikeID";

        $stmt =$this->query($sql);
        $datas=$stmt->fetchAll(\PDO::FETCH_OBJ);
        return $datas;
    }

    public  function findOneByID($tagID,$hikeID)
    {
        $sql = "SELECT * FROM Hikes_has_tags INNER JOIN Tags on Tags.id = Hikes_has_tags.tag 
         WHERE Hikes_has_tags.tag = ? AND Hikes_has_tags.hike = ?";

        $stmt =$this->query($sql,[$tagID,$hikeID]);
        $data=$stmt->fetch(\PDO::FETCH_OBJ);
        return $data;
    }


}