<?php

namespace Controllers;
use Models\Tag;
class TagsController
{
    public function select()
    {
        $tags = new Tag();
        $datas = $tags->findAll();
        return $datas;
    }


    public function create()
    {
        include 'Views/layout/header.views.php';
        include 'Views/tags/Dashboard/create.views.php';
    }

    public function store()
    {
        $tags = new Tag();
        $tags->store($_POST['name']);
        header('Location:http://localhost:3000/hikes/dashboard/index');
    }

    public function find()
    {
        $data = new Tag();
        $tags = $data->findAll();
        include 'Views/layout/header.views.php';
        include 'Views/tags/Dashboard/index.views.php';
    }

    public function updateForm($id)
    {

        $data = new Tag();
        $tag =$data->findOneByID($id);

        include 'Views/layout/header.views.php';
        include 'Views/tags/Dashboard/update.views.php';

    }

    public  function update()
    {
        $name = htmlspecialchars($_POST['name']);
        $tagID = $_POST['tagID'];

        $tag = new Tag();
        $tag->update($name,$tagID);

        header('location:/tags/gestion');

    }

    public function delete($id)
    {
        $tag = new Tag();
        $tag->delete($id);
        header('location:/tags/gestion');
    }
}