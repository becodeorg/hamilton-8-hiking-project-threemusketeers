<?php 
namespace App\Models;

use App\Models\Database;
use PDO;

class Hikes extends Database
{
    public function getAllHikes()
    {
        $query = "SELECT * FROM Hikes";
        $stmt = $this->query($query);
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $hikes;
    }

    public function getHikeById(int $id)
    {
        $query = "SELECT * FROM Hikes WHERE id = ?";
        $stmt = $this->prepare($query);
        $stmt->execute([$id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);
        return $hike;
    }
}
