<?php 

namespace App\Controllers;

use App\Models\User;

class ProfileController{
    public function profile() {

        $displayCurrentUserProfile = (new User()) -> find_user($_SESSION["user"]["nickname"]);

        include 'app/Views/layout/header.view.php';
        include "app/Views/profile.view.php";
        include 'app/Views/layout/footer.view.php';
        
    }
}