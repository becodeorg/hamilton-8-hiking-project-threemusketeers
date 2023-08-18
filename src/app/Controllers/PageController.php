<?php

namespace App\Controllers;

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
}