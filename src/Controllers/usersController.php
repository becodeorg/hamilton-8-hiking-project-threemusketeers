<?php

namespace Controllers;
use Models\User;
class usersController
{
    public function index()
    {

        $datas = new User();
        $users =$datas->findALl();
        include 'Views/layout/header.views.php';
        include 'Views/users/Dashboard/index.views.php';
    }

    public function updateForm()
    {
        $data = new User();
        $user=$data->findOneByID($_GET['id']);
        include 'Views/layout/header.views.php';
        include 'Views/users/Dashboard/updateForm.views.php';
    }

    public function store()
    {
        $firstName      =   htmlspecialchars($_POST['firstName']);
        $lastName       =   htmlspecialchars($_POST['lastName']);
        $email          =   filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);;
        $userID         =   isset($_POST['userID'])?$_POST['userID']:null;

        if (is_null($userID))
        {
        //inserer un nouvel user
        }else
        {
            $model = new User();
            $model->store($firstName,$lastName,$email,$userID);

        }
    }

    public function delete($id)
    {

        $user = new User();
        $user->delete($id);
        header('location:/users/gestion');
    }
}
