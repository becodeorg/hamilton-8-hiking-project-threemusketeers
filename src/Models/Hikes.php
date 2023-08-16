<?php 
namespace Models;
use Models\Database;
use PDO;

class Hikes extends Database
{
 public function getAllHikes(){
    $query = "SELECT * FROM Hikes";
    $stmt = $this->query($query);
    $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $hikes;
 }
}
?>