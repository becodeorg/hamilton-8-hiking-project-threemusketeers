<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Hikes;
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

        try {
            $data = new Hikes();
            $hikes = $data->getAllHikes();
            include 'app/Views/layout/header.view.php';
            include 'app/Views/index.view.php';
            include 'app/Views/layout/footer.view.php';
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

    }

    public function profile() {

        $displayCurrentUserProfile = (new User()) -> find_user($_SESSION["user"]["nickname"]);

        include 'app/Views/layout/header.view.php';
        include "app/Views/profile.view.php";
        include 'app/Views/layout/footer.view.php';
    }

    public function display_user_hikes(){

        $displayUserHikes = (new User()) -> user_hikes($_SESSION["user"]["id"]);

        include 'app/Views/layout/header.view.php';
        include "app/Views/hikesUser.view.php";
        include 'app/Views/layout/footer.view.php';
        
    }

}