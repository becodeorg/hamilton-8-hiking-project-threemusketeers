<?php

namespace Controllers;

use Models\Hike_Tag;

class HikestagsController
{
    public function deleteTag($tagID)
    {
        $hike_tag = new Hike_Tag();
        $hike_tag->deleteTag($tagID);

    }

    public  function deleteHike($hikeID)
    {
        $hike_tag = new Hike_Tag();
        $hike_tag->deleteHike($hikeID);
    }

    public function store($lastID)
    {

        $hike_tag = new Hike_Tag();
        $hike_tag->store($_POST['tags'],$lastID);
        header('Location:http://localhost:3000/hikes/dashboard/index');
    }

    public function find($hikeID)
    {
        $hikeTag = new Hike_Tag();
        $datas =$hikeTag->find($hikeID);
        return $datas;
       // var_dump($datas);
        //die();

    }


    public function update($array,$hikeID)
    {
        $hikeHasTags = new Hike_Tag();
        $hikeHasTags->update($array,$hikeID);
        header('Location:/hikes/dashboard/index');

    }

    public function isChecked($tagID,$hikeID)
    {

        $tag = new Hike_Tag();
        $data = $tag->findOneByID($tagID,$hikeID);

        return $data ;

    }
}