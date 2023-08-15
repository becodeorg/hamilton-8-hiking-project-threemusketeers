<?php

namespace Controllers;

use Models\Hike;


class HikesController
{
    public function create()
    {
        include 'Views/layout/header.views.php';
        include 'Views/hikes/Dashboard/create.views.php';

        #include 'views/layout/footer.view.php';
    }

    public function store()
    {
        $name           =   htmlspecialchars($_POST['name']);
        $distance       =   $_POST['distance'];
        $duration       =   $_POST['duration'];
        $gain           =   $_POST['elevation_gain'];
        $description    =   htmlspecialchars($_POST['description']);
        $tag_id         =   $_POST['tags'];
        $hikeID         =   isset($_POST['hikeID'])?$_POST['hikeID']:null;

            if (empty($name) || empty($distance) || empty($duration)|| empty($gain) || empty($description))
            {

                //throw new Exception('Formulaire non complet');
             }

            $model = new Hike();

            $model->store($name,$distance,$duration,$gain,$description,$tag_id,$hikeID);

            header('Location:http://localhost:3000/hikes/dashboard/index');

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

            include 'Views/layout/header.views.php';
            include 'Views/hikes/Dashboard/index.views.php';



    }

public function delete()
{
    $id = (int)$_GET['id'];
    $model = new Hike();
    $model->delete($id);
    // modifier le localhost
    header('Location:http://localhost:3000/hikes/dashboard/index');


}

public function update()
{

    $model = new Hike();
    $hike = $model->getByID($_GET['id']);

    include 'Views/layout/header.views.php';
    include 'Views/hikes/Dashboard/updateForm.views.php';
}


}