<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Database;
<<<<<<< HEAD
use PDO;
=======
use App\Models\User;
>>>>>>> 84dceb706d9dd5a70b0c479d47cb5f7658ade799

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

    public function display_user_hikes(){

        $displayUserHikes = (new User()) -> user_hikes($_SESSION["user"]["id"]);

        include 'app/Views/layout/header.view.php';
        include "app/Views/hikesUser.view.php";
        include 'app/Views/layout/footer.view.php';
        
    }

    public function display_hikes_details(){

        $hike = (new HikesDetailsController()) -> hikesDetails();
        include 'app/Views/layout/header.view.php';
        include 'app/Views/hikesdetails.view.php';
        include 'app/Views/layout/footer.view.php';
        
    }
}


