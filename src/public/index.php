<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
session_start();

use App\Controllers\AuthController;
use App\Controllers\PageController;
use App\Models\User;
use App\Controllers\IndexController;
use App\Controllers\HikesDetailsController;
use App\Controllers\NewHikeController;

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

    switch ($url_path) {
        case "":
        case "/index.php":
            $displayIndex = new IndexController();
            $displayIndex->index();
            break;
        case "register":
            if ($method === "GET") (new AuthController())->showRegistrationForm();
            if ($method === "POST") (new AuthController())->register($_POST['firstName'],$_POST['lastName'], $_POST['nickname'],$_POST['email'], $_POST['password']);
            break;
        case "login":
            $authController = new AuthController();
            if ($method === "GET") $authController->showLoginForm();
            if ($method === "POST") $authController->login($_POST['nickname'], $_POST['password']);
            break;
        case "profile":
            $displayCurrentUserProfile = (new User()) -> find_user($_SESSION["user"]["nickname"]);
            include 'app/Views/layout/header.view.php';
            include "app/Views/profile.view.php";
            include 'app/Views/layout/footer.view.php';
            break;    
        case "logout":
            $authController = new AuthController();
            $authController->logout();
            break;
        case "modify":
            $modifyUserInfo = new AuthController();
            if($method === "GET") $modifyUserInfo->showModifyForm();
            if($method === "POST") $modifyUserInfo->modifyUser($_POST['firstName'],$_POST['lastName'], $_POST['nickname'],$_POST['email'], $_POST['password']);
            break;
        case "hikesUser" :
        case "myHikes":
            (new HikesDetailsController())->display_user_hikes();
            break;
        case "newHike":
            $newHike = new NewHikeController();
            if ($method === "GET") $newHike->showNewHikeForm();
            if ($method === "POST") $newHike->addNewHike($_POST['name'], $_POST['distance'], $_POST['duration'],$_POST['elevation_gain'],$_POST['description'],$_SESSION["user"]["id"], date("Y-m-d") . " " . date("h:i:s"), date("Y-m-d") . " " . date("h:i:s"));
            break;
        case "modifyHike":
            if ($method === "GET") (new HikesDetailsController())->displayModifyHikeForm();
            if ($method === "POST") (new NewHikeController())->modifyHike($_GET["id"], $_POST["name"], $_POST["distance"], $_POST["duration"], $_POST["elevation_gain"], $_POST["description"], date("Y-m-d") . " " . date("h:i:s"));
            break;
        case "deleteHike":
            (new HikesDetailsController())->deleteHike();
            break;
        case "hikesdetails":
            $HikesDetailsController = new HikesDetailsController();
            $hike = $HikesDetailsController->hikesDetails();
            break;
        default:
            $pageController = new PageController();
            $pageController->page_404();
            break;
    }
} catch (Exception $e) {
    $pageController = new PageController();
    $pageController->page_500($e->getMessage());
}

?>