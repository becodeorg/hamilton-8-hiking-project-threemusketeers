<?php

namespace App\Controllers;

use App\Models\User;
use Exception;

class PageController
{
    public function page_404(): void{

        include 'app/Views/layout/header.view.php';
        include 'app/Views/404.view.php';
        include 'app/Views/layout/footer.view.php';

    }

    public function page_500(string $errorMessage = ""): void{

        $error = $errorMessage;
        include 'app/Views/layout/header.view.php';
        include 'app/Views/500.view.php';
        include 'app/Views/layout/footer.view.php';

    }

    public function index(){     

        include 'app/Views/layout/header.view.php';
        include 'app/Views/index.view.php';
        include 'app/Views/layout/footer.view.php';

    }

    public function profile() {

        $displayCurrentUserProfile = (new User()) -> find_user($_SESSION["user"]["nickname"]);

        include 'app/Views/layout/header.view.php';
        include "app/Views/profile.view.php";
        include 'app/Views/layout/footer.view.php';
    }

}