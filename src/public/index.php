<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
session_start();

use App\Controllers\AuthController;
use App\Controllers\PageController;
use App\Controllers\ProductController;

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

    switch ($url_path) {
        case "":
        case "/index.php":
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
        case "profile":
            (new PageController())->profile();
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
        case "hikesUser":
            (new PageController())->display_user_hikes();
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
session_start();
require_once 'vendor/autoload.php';

use Controllers\HikesController;
use Controllers\TagsController;
use Controllers\AuthController;
use Controllers\UsersController;
use Controllers\HikesDetailsController;
use Controllers\IndexController;

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST
    switch ($url_path) {
        case "":
        case "index":
                $IndexController = new IndexController();
                $IndexController->index();
        break;
        
        case "hikesdetails":
            
                $HikesDetailsController = new HikesDetailsController();
                $HikesDetailsController->Hikesdetails();
            
        break;
            
        case "register":

                if ($method == "GET") {
                    $authController = new authController();
                    $authController->register();
                }
                if ($method == 'POST'){
                    $authController = new authController();
                    $authController->store();
                }

        break;
        case "login":

            if ($method == "GET") {
                $authController = new authController();
                $authController->loginForm();
            }
            if ($method == 'POST'){
                $authController = new authController();
                $authController->login();

            }

            break;

        case 'logout':
            $authController=  new  authController();
            $authController->logout();
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
                $authController = new authController();
                if (
                    $authController->verification($_GET['id'])
                    || $authController->verification($_POST['hikeID'])
                    || ($_SESSION['user']['admin'] == 1)
                ) {
                    if ($method == "GET") {
                        $hikesController = new HikesController();
                        $hikesController->update();
                    }
                    if ($method == 'POST') {
                        $hikesController = new HikesController();
                        $hikesController->store();
                    }
                }
                break;
        }
    } catch (Exception $e) {
        print_r($e->getMessage());
    }
?>