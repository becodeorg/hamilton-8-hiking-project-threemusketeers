<?php 

namespace App\Models;

use App\Models\Database;


use PDO;

class Hikes extends Database
{



      public function getAllHikes(){
          if(is_null($_GET['tag']))
          {
              $query = "SELECT * FROM Hikes";
              $stmt = $this->query($query);
          }else{
              $query = "SELECT Tags.name as tagName,Hikes.id,Hikes.name,Hikes.distance,Hikes.duration,Hikes.elevation_gain FROM Hikes 
    INNER JOIN Hikes_has_tags ON Hikes_has_tags.hike=Hikes.id 
    INNER JOIN Tags ON Hikes_has_tags.tag = Tags.id
 WHERE  Tags.name=?" ;
              $stmt = $this->query($query,[$_GET['tag']]);
          }

          $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $hikes;

    }

  public function createNewHike($name, $distance, $duration, $elevation_gain, $description, $userId, $created_at, $updated_at){

    $sql = "INSERT INTO Hikes (name, distance, duration, elevation_gain, description, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $this->query($sql, [$name, $distance, $duration, $elevation_gain, $description, $userId, $created_at, $updated_at]);
    return $this->lastInsertId();

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