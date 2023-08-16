<?php
declare(strict_types=1);
namespace Controllers;
use PDO;
use Models\Database;

class HikesDetailsController extends Database
{
    public function Hikesdetails()
    
    {
        
            $id = (int)$_GET['id'];
            $query = "SELECT * FROM Hikes WHERE id = ?";
            $stmt = $this->query($query, [$id]);
            $hike = $stmt->fetch(PDO::FETCH_ASSOC);
                include '../views/layout/header.view.php';
                include '../views/hikesdetails.view.php';
                include '../views/layout/footer.view.php';
        }
    }

?>
