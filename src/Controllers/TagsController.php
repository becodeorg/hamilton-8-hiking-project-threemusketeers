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


}