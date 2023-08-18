<?php
namespace App\Controllers;
use App\Models\User;
class usersController
{
    public function index()
    {

        $datas = new User();
        $users =$datas->findALl();

        include 'app/Views/layout/header.view.php';
        include 'app/Views/users/Dashboard/index.views.php';
    }

    public function updateForm()
    {

        $data = new User();
        $user=$data->findOneByID($_GET['id']);

        include 'app/Views/layout/header.view.php';
        include 'app/Views/users/Dashboard/updateForm.views.php';

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

        header('location:/users/gestion');
    }

    public function delete($id)
    {
        // faut-il supprimer les hikes cooressponant aux user
        // faire un input pour dire oui ou non
        $user = new User();
        $user->delete($id);
        header('location:/users/gestion');
    }
}
