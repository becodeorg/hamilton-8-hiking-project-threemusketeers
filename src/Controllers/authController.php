<?php

namespace Controllers;
use Models\Auth;

class authController
{
    public function register()
    {
        include 'Views/layout/header.views.php';
        include 'Views/Authentification/registerForm.views.php';
    }

    public function store()
    {
        $firstName   =   htmlspecialchars($_POST['firstName']);
        $lastName    =   htmlspecialchars($_POST['lastName']);
        $nickName     =   htmlspecialchars($_POST['nickName']);
        $email       =   filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);;
        $password    =   password_hash($_POST['password'], PASSWORD_DEFAULT);

        $auth = new Auth();
        $auth->store($firstName,$lastName,$nickName,$email,$password);

        $_SESSION['user'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'nickName' => $nickName,
            'email' => $email
        ];
        header('Location:http://localhost:3000/hikes/dashboard/index');

    }
    public function logout()
    {
        unset($_SESSION['user']);
        http_response_code(302);
        header('location: /');
    }

    public function loginForm()
    {
        include 'Views/layout/header.views.php';
        include 'Views/Authentification/loginForm.views.php';
    }

    public function login()
    {
        $auth = new Auth();
        $user =$auth->find($_POST['email']);
        if (password_verify($_POST['password'], $user->password === false)) {
            throw new Exception('Mauvais mot de passe');
        }

        $_SESSION['user'] = [
            'id'=>$user->id,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => $user->email,
            'admin'=>$user->admin
        ];

        header('Location:http://localhost:3000/hikes/dashboard/index');
    }

    public function verification($id)
    {

        $auth = new Auth();
        $hikes_has_user = $auth->verification($id);
        if ($hikes_has_user->user == $_SESSION['user']['id'])
        {
           return true;
        }else{
            return false;
        }


    }

}