<?php
session_start();
//declare(strict_types=1);

require_once 'vendor/autoload.php';


use App\Controllers\AuthController;
use App\Controllers\PageController;

//use App\Controllers\ProductController;

use App\Models\User;

use App\Controllers\IndexController;
use App\Controllers\HikesDetailsController;
use App\Controllers\usersController;
use App\Controllers\HikestagsController;
use App\Controllers\TagsController;
use App\Controllers\HikesController;
/*
use Controllers\HikesController;
use Controllers\TagsController;
use Controllers\authController;
use Controllers\usersController;
use Controllers\HikestagsController;
*/

$url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
$method = $_SERVER['REQUEST_METHOD'];

switch ($url_path)
{
    case "":
    case "index":

        $displayIndex = new PageController();
        $displayIndex->index();
        break;
    case "register":
        $authController = new AuthController();
        if ($method === "GET") $authController->showRegistrationForm();
        if ($method === "POST") $authController->register($_POST['firstName'],$_POST['lastName'], $_POST['nickname'],$_POST['email'], $_POST['password']);
        break;
    case "login":
        $authController = new AuthController();
        if ($method === "GET") $authController->showLoginForm();
        if ($method === "POST") $authController->login($_POST['nickname'], $_POST['password']);
        break;
    case "hikes/dashboard/update":

        $authController = new authController();
        if ($method == "GET")
        {
            $response = $authController->verification($_GET["id"]);
        }else{
            $response = $authController->verification($_POST['hikeID']);
        }
        if($response || ($_SESSION['user']['admin'] == 1))
        {

            if ($method == "GET")
            {
                $hikesController = new HikesController();
                $hikesController->update();

            }
            if ($method == 'POST'){

                $hikesController = new HikesController();
                $hikesController->store();
                $hikeTagController = new HikestagsController();
                $hikeTagController->update($_POST['tags'],$_POST['hikeID']);
            }
        }

        break;
         case "users/gestion":

        if($_SESSION['user']['admin'] == 1){
            $usersController = new usersController();
            $usersController->index();
        }
    break;
    case "users/gestion/update":

        if($_SESSION['user']['admin'] == 1){

            if ($method == "GET")
            {
                $usersController = new usersController();
                $usersController->updateForm();
            }
            if ($method == 'POST'){
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
        if ($method == "GET")
        {
            $tagsController = new TagsController();
            $tagsController->updateForm($_GET['id']);
        }
        if ($method == "POST")
        {
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
    case "hikesUser" || "myHikes":
        (new HikesDetailsController())->display_user_hikes();
        break;



    case "hikes/dashboard/create":
        if ($method == "GET")
        {

            $hikesController = new HikesController();

            $hikesController->create();

        }
        if ($method == 'POST'){
            $hikesController = new HikesController();
            $lastID =$hikesController->store();
            $hikeTagController = new HikestagsController();
            $hikeTagController->store($lastID);

        }

        break;

    case "hikes/dashboard/update":

        $authController = new authController();
        if ($method == "GET")
        {
            $response = $authController->verification($_GET["id"]);
        }else{
            $response = $authController->verification($_POST['hikeID']);
        }
        if($response || ($_SESSION['user']['admin'] == 1))
        {

            if ($method == "GET")
            {
                $hikesController = new HikesController();
                $hikesController->update();

            }
            if ($method == 'POST'){

                $hikesController = new HikesController();
                $hikesController->store();
                $hikeTagController = new HikestagsController();
                $hikeTagController->update($_POST['tags'],$_POST['hikeID']);
            }
        }

        break;



    case "tags/dashboard/create":
        if ($method == "GET") {
            $tagsConroller = new TagsController();
            $tagsConroller->create();
        }
        if ($method == 'POST'){
            $tagsController = new TagsController();
            $tagsController->store();
        }

        break;
    default:
        $pageController = new PageController();
        $pageController->page_404();
        break;

}
/*
<<<<<<< HEAD
session_start();
require_once 'vendor/autoload.php';

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST
    switch ($url_path) {
<<<<<<< HEAD



            case "hikes/dashboard/show":
                $hikesController = new HikesController();
                $hikesController->show($_GET['name']);
=======
        case "":
        case "/index.php":
            $displayIndex = new IndexController();
            $displayIndex->index();
>>>>>>> 84dceb706d9dd5a70b0c479d47cb5f7658ade799
            break;

            case "hikes/dashboard/index":

            $hikesController = new HikesController();

            $hikesController->index();
            break;

        case "hikes/dashboard/delete":
            $hikesController = new HikesController();
            $hikesController->delete();
            $hikeTagController = new HikestagsController();
            //$hikeTagController->deleteHike($_GET['id']);
            break;
<<<<<<< HEAD
        case "hikes/dashboard/update":

            $authController = new authController();
            if ($method == "GET")
            {
                $response = $authController->verification($_GET["id"]);
            }else{
                $response = $authController->verification($_POST['hikeID']);
            }
            if($response || ($_SESSION['user']['admin'] == 1))
            {

                if ($method == "GET")
                {
                    $hikesController = new HikesController();
                    $hikesController->update();

                }
               if ($method == 'POST'){

                    $hikesController = new HikesController();
                    $hikesController->store();
                   $hikeTagController = new HikestagsController();
                   $hikeTagController->update($_POST['tags'],$_POST['hikeID']);
                }
            }

            break;





        case "tags/update":
            if ($method == "GET")
            {
                $tagsController = new TagsController();
                $tagsController->updateForm($_GET['id']);
            }
            if ($method == "POST")
            {
                ;
                $tagsController = new TagsController();
                $tagsController->update();
            }

=======
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
        case "hikesUser" || "myHikes":
            (new HikesDetailsController())->display_user_hikes();
            break;
        case "hikesdetails":
            $HikesDetailsController = new HikesDetailsController();
            $hike = $HikesDetailsController->hikesDetails();
            echo $hike;
        break;
        default:
            $pageController = new PageController();
            $pageController->page_404();
>>>>>>> 84dceb706d9dd5a70b0c479d47cb5f7658ade799
            break;


    }
} catch (Exception $e) {

}*/



