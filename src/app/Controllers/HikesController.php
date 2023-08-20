<?php

namespace App\Controllers;


use App\Models\Hike;


class HikesController
{
    public function create()
    {
        include 'app/Views/layout/header.view.php';

        include 'app/Views/hikes/Dashboard/create.views.php';

        include 'app/Views/layout/footer.view.php';
    }

    public function store()
    {


        $name           =   htmlspecialchars($_POST['name']);
        $distance       =   $_POST['distance'];
        $duration       =   $_POST['duration'];
        $gain           =   $_POST['elevation_gain'];
        $description    =   htmlspecialchars($_POST['description']);
        $hikeID         =   isset($_POST['hikeID'])?$_POST['hikeID']:null;


            if (empty($name) || empty($distance) || empty($duration)|| empty($gain) || empty($description))
            {

                //throw new Exception('Formulaire non complet');
             }

            $model = new Hike();


            $model->store($name,$distance,$duration,$gain,$description,$hikeID);



            return  $model->lastInsertId();


    }




    public function show($name)
    {
        $model = new Hike();
        $hike = $model->findOneByName($name);
        include 'Views/layout/header.views.php';
        include 'Views/hikes/Dashboard/show.views.php';
        //include 'views/layout/footer.view.php';
    }

    public function index()
    {

        $model = new Hike();
        $hikes = $model->findAll();

        include 'app/Views/layout/header.view.php';
        include 'app/Views/hikes/Dashboard/index.views.php';
        include 'app/Views/layout/footer.view.php';
    }

public function delete()
{
    $id = (int)$_GET['id'];
    $model = new Hike();
    $model->delete($id);
    // modifier le localhost
    header('Location:http://localhost:3000/hikes/dashboard/index');

}

public  function deleteByUserID($userID)
{
    $model = new Hike();
    $model->deleteByUSserID($userID);

}

public function update()
{

    $model = new Hike();
    $hike = $model->getByID($_GET['id']);

    include 'app/Views/layout/header.view.php';
    include 'app/Views/hikes/Dashboard/updateForm.views.php';
    include 'app/Views/layout/footer.view.php';

}


}