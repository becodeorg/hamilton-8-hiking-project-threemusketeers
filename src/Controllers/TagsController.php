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


}