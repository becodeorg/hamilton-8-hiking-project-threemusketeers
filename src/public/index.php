<?php
declare(strict_types=1);
require_once 'vendor/autoload.php';
use Controllers\HikesController;
try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST
    switch ($url_path) {

        case "hikes/dashboard/create":
            if ($method == "GET")
            {
                $hikesController = new HikesController();
                $hikesController->create();
            }
            if ($method == 'POST'){
                $hikesController = new HikesController();
                $hikesController->store();
            }

            break;


            case "hikes/dashboard/show":
                $hikesController = new HikesController();
                $hikesController->show($_GET['name']);
            break;

            case "hikes/dashboard/index":
            $hikesController = new HikesController();
            $hikesController->index();
            break;

        case "hikes/dashboard/delete":
            $hikesController = new HikesController();
            $hikesController->delete();
            break;
        case "hikes/dashboard/update":
            if ($method == "GET")
            {
                $hikesController = new HikesController();
                $hikesController->update();
            }
            if ($method == 'POST'){
                $hikesController = new HikesController();
                $hikesController->store();
            }
            break;
    }
} catch (Exception $e) {

}