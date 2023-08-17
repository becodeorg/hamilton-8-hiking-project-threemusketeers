<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Database;
use PDO;

class HikesDetailsController extends Database
{
    public function hikesDetails($id)
    {
        $query = "SELECT * FROM Hikes WHERE id = ?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->execute([$id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);

        include 'app/Views/layout/header.view.php';
        include 'app/Views/hikesdetails.view.php';
        include 'app/Views/layout/footer.view.php';
    }
}


