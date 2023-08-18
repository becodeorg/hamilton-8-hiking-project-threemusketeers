<?php
declare(strict_types=1);
namespace App\Models;
use App\Models\Database;
use PDO;
use Exception;
class Hike extends Database
{
    public function store($name,$distance,$duration,$gain,$description,$hikeID)
    {
            $t = time();
            $date =date("Y-m-d",$t);

            if (is_null($hikeID))
            {

                    $sql = "INSERT INTO Hikes
            (name,distance,duration,elevation_gain,description,user_id,created_at,updated_at) VALUES (?, ?, ?, ?,? ,? ,? ,?);";

                    $stmt = $this->query($sql,
                        [$name, $distance, $duration, $gain, $description, $_SESSION['user']['id'], $date, $date]);

            }else{

                $sql ="UPDATE Hikes
SET name=?, distance= ?, duration= ?,elevation_gain = ?,description = ?
WHERE id=".(int)$hikeID;


                $stmt = $this->query($sql,
                [$name,$distance,$duration,$gain,$description]);

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
            /*$sql ="SELECT *,Hikes.id as hikeID,Hikes.name as hikeName, Tags.name as tagName
FROM Hikes 
    INNER JOIN Tags ON Tags.id = Hikes.tag_id INNER JOIN Hikes_has_users ON Hikes.id = Hikes_has_users.hike 
    INNER JOIN Users on Hikes_has_users.user = Users.id 
WHERE Users.id =".(int)$_SESSION['user']['id'];*/

            $sql = "SELECT *,Hikes.id as hikeID,Hikes.name as hikeName
FROM Hikes 
   INNER JOIN Users on Users.id = Hikes.user_id
    
WHERE Users.id =".(int)$_SESSION['user']['id'];

        }else{
            $sql ="SELECT *,Hikes.id as hikeID,Hikes.name as hikeName
FROM Hikes ";




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