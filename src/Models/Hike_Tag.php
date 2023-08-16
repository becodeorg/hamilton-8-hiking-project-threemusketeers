<?php

namespace Models;
use Models\Database;
class Hike_Tag extends Database
{
    public function delete($tagID)
    {
        $sql = "DELETE FROM Hikes_has_tags WHERE tag = $tagID";
        $this->query($sql);
    }
}