<?php
use App\Controllers\AuthController;
use App\Controllers\HikesDetailsController;
use App\Controllers\usersController;
class Router
{

    private  $authController;
    private $HikesDetailsController;

    private $usersController;

    protected $routes = [
        '/',
        '/login',
        '/auth/login',
        '/register',
        '/hikesUser',
        '/users/gestion'
    ];




    public function __construct()
    {
        $this->authController = new AuthController();
        $this->HikesDetailsController = new HikesDetailsController();
        $this->userController = new usersController();

    }
    public function connect($url,$method)
    {

        if ($url === "" || $url === "index.php") {
            $this->index();
        }
        if ($url === "product") {
            $this->showProduct();
        }
        if ($url === "login") {
            $this->login($method);
        }
        if ($url === "logout") {
            $this->logout();
        }
        if ($url === "register") {
            $this->register($method);
        }

    }

    private function register($method)
    {

        if ($method === "GET")  $this->_authController->showRegistrationForm();
        if ($method === "POST") $this->_authController->register($_POST['username'],$_POST['email'], $_POST['password']);

    }

    private function logout()
    {
        $this->authController->logout();
    }
    private function login($method)
    {

        if ($method === "GET") $this->authController->showLoginForm();
        if ($method === "POST") $this->authController->login();
    }

   private function display_user_hikes()
   {
       $this->HikesDetailsController->display_user_hikes();
   }
    private function showProduct()
    {
        $this->_productController->show($_GET['productCode']);
    }


    private function usersIndex()
    {
        var_dump('passe');
        die();
        $this->usersController->index();
    }
    public  function get($url,$action)
    {

        $array =explode("@", $action);
        $ctrl = $array[0];
        $method = $array[1];


        foreach($this->routes as $route)
        {

            if($url ===$_SERVER['REQUEST_URI']and $url === $route  )
            {


                $this->$ctrl->$method();
            }
        }


    }

    public  function post($url,$action)
    {

        $array =explode("@", $action);
        $ctrl = $array[0];
        $method = $array[1];


        foreach($this->routes as $route)
        {

            if($url ===$_SERVER['REQUEST_URI']and $url === $route  )

            {
                $this->$ctrl->$method();
            }
        }


    }
}