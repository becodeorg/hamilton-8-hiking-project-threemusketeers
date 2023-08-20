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

  public function getHike(){

    $id = (int)$_GET['id'];
    $query = "SELECT * FROM Hikes WHERE id = ?";
    $stmt = $this->query($query, [$id]);
    $hike = $stmt->fetch(PDO::FETCH_ASSOC);

    return $hike;
    
  }

  public function changeHikeInfo($id, $name, $distance, $duration, $elevation_gain, $description, $updated_at){

    $sql = "UPDATE Hikes SET name = ?, distance = ?, duration = ?, elevation_gain = ?, description = ?, updated_at = ? WHERE id = ?";

    $stmt = $this->query($sql, [$name, $distance, $duration, $elevation_gain, $description, $updated_at, $id]);

  }

  public function deleteHike(){

    $id = (int)$_GET['id'];
    $sql = "DELETE FROM Hikes WHERE id = ?";
    $stmt = $this->query($sql, [$id]);

  }

}