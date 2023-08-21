<?php

namespace App\Models;
use App\Models\Database;
use PDO;
use Exception;
class Favoris extends Database
{
    public function add($hikeID)
    {

        $this->query('INSERT INTO Favorites(hike, user ) VALUES (?,?); ',[$hikeID,$_SESSION['user']['id']]);

    }

    public  function index()
    {
       $stmt= $this->query('SELECT * FROM `Favorites`
        INNER JOIN Hikes ON Hikes.id = Favorites.hike
        WHERE user =? ',[$_SESSION['user']['id']]);

        $datas = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $datas;
    }


    public function delete($hikeID,$userID)
    {
        $this->query('DELETE FROM Favorites WHERE user = ? AND hike = ?;',[$userID,$hikeID]);
    }

    public function deleteAll($userID)
    {
        $this->query('DELETE FROM Favorites WHERE user = ? ;',[$userID]);
    }
}

