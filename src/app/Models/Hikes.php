<?php 

namespace App\Models;

use App\Models\Database;

use PDO;

class Hikes extends Database
{

 public function getAllHikes(){
    $query = "SELECT * FROM Hikes";
    $stmt = $this->query($query);
    $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $hikes;
 }

 public function createNewHike($name, $distance, $duration, $elevation_gain, $description, $userId, $created_at, $updated_at){
   $sql = "INSERT INTO Hikes (name, distance, duration, elevation_gain, description, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
   $stmt = $this->query($sql, [$name, $distance, $duration, $elevation_gain, $description, $userId, $created_at, $updated_at]);
 }
}
