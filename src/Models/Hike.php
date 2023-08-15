<?php

namespace Models;
use Models\Database;
use PDO;
class Hike extends Database
{
    public function store($name,$distance,$duration,$gain,$description,$tag,$hikeID)
    {
            $t = time();
            $date =date("Y-m-d",$t);

            if (is_null($hikeID))
            {
                $stmt = $this->query("INSERT INTO Hikes
    (name,distance,duration,elevation_gain,description,tag_id,created_at,updated_at) VALUES (?, ?, ?, ?,?,?,?,?)",
                    [$name,$distance,$duration,$gain,$description,$tag,$date,$date]);

            }else{

                $sql ="UPDATE Hikes
SET name=?, distance= ?, duration= ?,elevation_gain = ?,description = ?,tag_id = ?,created_at=?,updated_at=?
WHERE id=".(int)$hikeID;

                $stmt = $this->query($sql,
                [$name,$distance,$duration,$gain,$description,$tag,$date,$date]);


            }
    }


    public function findOneByName($name)
    {
        $stmt = $this->query("SELECT * FROM Hikes WHERE name = ? ",[$name]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function findAll()
    {
        if ($_SESSION['user']['admin'] == 0)
        {
            $sql ="SELECT *,Hikes.id as hikeID,Hikes.name as hikeName, Tags.name as tagName 
FROM Hikes 
    INNER JOIN Tags ON Tags.id = Hikes.tag_id INNER JOIN Hikes_has_users ON Hikes.id = Hikes_has_users.hike 
    INNER JOIN Users on Hikes_has_users.user = Users.id 
WHERE Users.id =".$_SESSION['user']['id'];
        }else{
            $sql ="SELECT *,Hikes.id as hikeID,Hikes.name as hikeName, Tags.name as tagName 
FROM Hikes 
    INNER JOIN Tags ON Tags.id = Hikes.tag_id INNER JOIN Hikes_has_users ON Hikes.id = Hikes_has_users.hike 
    INNER JOIN Users on Hikes_has_users.user = Users.id ";
        }

        $stmt = $this->query($sql);


        $datas =$stmt->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    public function delete($id)
    {
        $this->query("DELETE FROM Hikes WHERE id = ?",[$id]);

    }

    public function getByID($id)
    {
        $stmt = $this->query("SELECT * FROM Hikes WHERE id = ? ",[$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }



}