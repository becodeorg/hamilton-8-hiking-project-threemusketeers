<?php
declare(strict_types=1);
namespace App\Controllers;
use PDO;
use App\Models\Database;
use App\Models\User;

class HikesDetailsController extends Database
{
    public function hikesDetails()
    {
       
        $id = (int)$_GET['id'];
        $query = "SELECT * FROM Hikes WHERE id = ?";
        $stmt = $this->query($query, [$id]);
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


