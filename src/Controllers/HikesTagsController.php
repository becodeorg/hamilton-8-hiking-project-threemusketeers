<?php

namespace Controllers;

use Models\Hike_Tag;

class HikestagsController
{
    public function delete($tagID)
    {
        $hike_tag = new Hike_Tag();
        $hike_tag->delete($tagID);

    }
}