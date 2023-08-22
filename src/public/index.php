<?php
session_start();


require_once 'vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\PageController;
use App\Models\User;
use App\Controllers\IndexController;
use App\Controllers\HikesDetailsController;
use App\Controllers\usersController;
use App\Controllers\HikestagsController;
use App\Controllers\TagsController;
use App\Controllers\HikesController;
use App\Controllers\NewHikeController;
use App\Controllers\FavoritesController;


$url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
$method = $_SERVER['REQUEST_METHOD'];


try{
    switch ($url_path) {
        case "":
        case "/index.php":

            $displayIndex = new IndexController();
            $displayIndex->index();
            break;
        case "hikes/dashboard/delete":
            $hikesController = new HikesController();
            $hikesController->delete();
            $hikeTagController = new HikestagsController();
            $hikeTagController->deleteHike($_GET['id']);

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
        case "tags/dashboard/create":

            if ($method == "GET") {
                $tagsConroller = new TagsController();
                $tagsConroller->create();
            }
            if ($method == 'POST') {
                $tagsController = new TagsController();
                $tagsController->store();
            }

            break;
        case "hikes/dashboard/update":

            $authController = new authController();
            if ($method == "GET") {
                $response = $authController->verification($_GET["id"]);
            } else {
                $response = $authController->verification($_POST['hikeID']);
            }
            if ($response || ($_SESSION['user']['admin'] == 1)) {

                if ($method == "GET") {
                    $hikesController = new HikesController();
                    $hikesController->update();

                }
                if ($method == 'POST') {

                    $hikesController = new HikesController();
                    $hikesController->store();
                    $hikeTagController = new HikestagsController();
                    $hikeTagController->update($_POST['tags'], $_POST['hikeID'],1);
                }
            }

            break;
        case "users/gestion":

            if ($_SESSION['user']['admin'] == 1) {
                $usersController = new usersController();
                $usersController->index();
            }
            break;
        case 'users/gestion/deleteAll':
            $usersController = new usersController();
            $usersController->delete($_GET['id']);
            $hikesController =  new HikesController();
            $hikesController->deleteByUserID($_GET['id']);
            break;
        case "users/gestion/update":

            if ($_SESSION['user']['admin'] == 1) {

                if ($method == "GET") {
                    $usersController = new usersController();
                    $usersController->updateForm();
                }
                if ($method == 'POST') {
                    $usersController = new usersController();
                    $usersController->store();

                }

            }
            break;

        case "users/gestion/delete":
            $usersController = new usersController();
            $usersController->delete($_GET['id']);
            break;
        case "tags/gestion":
            $tagsController = new TagsController();
            $tagsController->find();
            break;
        case "tags/delete":
            $tagsController = new  TagsController();
            $tagsController->delete($_GET['id']);
            $hikeTagController = new HikestagsController();
            $hikeTagController->deleteTag($_GET["id"]);

            break;
        case "tags/update":
            if ($method == "GET") {
                $tagsController = new TagsController();
                $tagsController->updateForm($_GET['id']);
            }
            if ($method == "POST") {
                ;
                $tagsController = new TagsController();
                $tagsController->update();
            }

            break;
        case "hikes/dashboard/index":

            $hikesController = new HikesController();
            $hikesController->index();
            break;
        case "hikesdetails":

            $HikesDetailsController = new HikesDetailsController();
            $hike = $HikesDetailsController->hikesDetails();
            break;

        case "profile":
            $displayCurrentUserProfile = (new User())->find_user($_SESSION["user"]["nickname"]);

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
            if ($method === "GET") $modifyUserInfo->showModifyForm();
            if ($method === "POST") $modifyUserInfo->modifyUser($_POST['firstName'], $_POST['lastName'], $_POST['nickname'], $_POST['email'], $_POST['password']);
            break;
            case "newHike":
                $newHike = new NewHikeController();
                if ($method === "GET") $newHike->showNewHikeForm();
                if ($method === "POST")
                {
                    $lastID=$newHike->addNewHike($_POST['name'], $_POST['distance'], $_POST['duration'],$_POST['elevation_gain'],$_POST['description'],$_SESSION["user"]["id"], date("Y-m-d") . " " . date("h:i:s"), date("Y-m-d") . " " . date("h:i:s"));
                    $hikeTagController = new HikestagsController();
                    ;
                    $hikeTagController->store($lastID,2);

                }
                break;
        case "modifyHike":
            if ($method === "GET") (new HikesDetailsController())->displayModifyHikeForm();
            if ($method === "POST")
            {
                $newHikeController = new NewHikeController();
                $newHikeController->modifyHike($_GET["id"], $_POST["name"], $_POST["distance"], $_POST["duration"], $_POST["elevation_gain"], $_POST["description"], date("Y-m-d") . " " . date("h:i:s"));
                $hikeTagController = new HikestagsController();
                $hikeTagController->update($_POST['tags'],$_POST['hikeID'],2);
            }
            break;
        case "deleteHike":
            (new HikesDetailsController())->deleteHike();
            break;
        case "hikesUser" :
        case "myHikes":
            (new HikesDetailsController())->display_user_hikes();
            break;
        case "hikes/dashboard/create":
            if ($method == "GET") {
                $hikesController = new HikesController();
                $hikesController->create();
            }
            if ($method == 'POST') {
                $hikesController = new HikesController();
                $lastID = $hikesController->store();
                $hikeTagController = new HikestagsController();
                $hikeTagController->store($lastID,1);
            }
            break;

        case "hikes/dashboard/update":

            $authController = new authController();
            if ($method == "GET") {
                $response = $authController->verification($_GET["id"]);
            } else {
                $response = $authController->verification($_POST['hikeID']);
            }
            if ($response || ($_SESSION['user']['admin'] == 1)) {

                if ($method == "GET") {
                    $hikesController = new HikesController();
                    $hikesController->update();

                }
                if ($method == 'POST') {

                    $hikesController = new HikesController();
                    $hikesController->store();
                    $hikeTagController = new HikestagsController();
                    $hikeTagController->update($_POST['tags'], $_POST['hikeID'],1);
                }
            }
            break;

        case "favorite/delete":

            $favorites = new FavoritesController();
            $favorites->delete();
            break;
        case "favorite":

            $favorites = new FavoritesController();
            $favorites->add();
            break;
        case "favorite/index":

            $favorites = new  FavoritesController();
            $favorites->index();
            break;

        default:
            $pageController = new PageController();
            $pageController->page_404();
            break;
    }
} catch(Exception $e){
    $pageController = new PageController();
    $pageController->page_500($e->getMessage());
}

?>


