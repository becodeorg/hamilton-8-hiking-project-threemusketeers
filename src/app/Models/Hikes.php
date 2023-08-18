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
}
