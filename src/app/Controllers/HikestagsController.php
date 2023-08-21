<?php

namespace App\Controllers;

use App\Models\Hike_Tag;

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

    public function store($lastID,$redirect)
    {

        $hike_tag = new Hike_Tag();
        $hike_tag->store($_POST['tags'],$lastID);

        if ($redirect == 1)
        {
            header('Location:/hikes/dashboard/index');
        }else {
            http_response_code(302);
            header('location: /hikesUser');
        }


    }


    public function create($hikeID)
    {
        $hike_tag = new Hike_Tag();
        $hike_tag->store($_POST['tags'],$hikeID);
    }
    public function find($hikeID)
    {
        $hikeTag = new Hike_Tag();
        $datas =$hikeTag->find($hikeID);
        return $datas;

    }


    public function update($array,$hikeID,$redirect)
    {

        $hikeHasTags = new Hike_Tag();
        $hikeHasTags->update($array,$hikeID);
        if ($redirect == 1)
        {
            header('Location:/hikes/dashboard/index');
        }else {
            http_response_code(302);
            header('location: /hikesUser');
        }
    }

    public function isChecked($tagID,$hikeID)
    {

        $tag = new Hike_Tag();
        $data = $tag->findOneByID($tagID,$hikeID);

        return $data ;

    }
}