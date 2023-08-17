<?php
declare(strict_types=1);
namespace App\Controllers;
use PDO;
use App\Models\Database;

class HikesDetailsController extends Database
{
    public function hikesDetails()
    {
       
        $id = (int)$_GET['id'];
        $query = "SELECT * FROM Hikes WHERE id = ?";
        $stmt = $this->query($query, [$id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);
        return $hike;
        
    }
}


