<?php

namespace App\Controllers;
use App\Models\Favoris;
class FavoritesController
{
    public function add()
    {
        $hikeID = (int)$_GET['hikeID'];

        $model = new Favoris();
        $model->add($hikeID);

        header('location:/favorite/index');

    }

    public function index()
    {

        $model = new Favoris();
        $favorites = $model->index();

        include 'app/Views/layout/header.view.php';
        include 'app/Views/Favorites/index.views.php';
        include 'app/Views/layout/footer.view.php';

    }

    public function delete()
    {
        $model = new Favoris();
        $favorites = $model->delete($_GET['hikeID'],$_SESSION['user']["id"]);
        header('location:/favorite/index');
    }


    public function deleteAll($userID)
    {
        $model = new Favoris();
        $model->deleteAll($userID);
    }
}