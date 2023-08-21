<?php

$controller = new App\Controllers\TagsController();
$datas =$controller->select();

$hikeTagsController = new App\Controllers\HikestagsController();

?>
<form method="post" action="/hikes/dashboard/update">
    <label for="name" >Name</label>
    <input type="text" name="name" value="<?=$hike->name?>" id="name">
    <label for="distance">  Distance</label>
    <input type="number" value="<?=$hike->distance?>" name="distance" id="distance">
    <label for="duration">  Duration</label>
    <input type="number" value="<?=$hike->duration?>" name="duration" id="duration">
    <label for="elevation_gain"> Gain</label>
    <input type="number" name="elevation_gain"  value="<?=$hike->elevation_gain?>"id="elevation_gain">
    <label for="description"> Description</label>
    <textarea id="description"  name="description"><?=$hike->description?>s</textarea>
    <p> Add tags</p>
    <?php
    foreach ($datas as $data)

    {
       // $hikeTagsController->isChecked($data->id,$hike->id));

        if ( $hikeTagsController->isChecked($data->id,$hike->id)!= null)
        {
            ?>

            <label><input type="checkbox" name="tags[]"  value="<?=$data->id?>"  checked> <?=$data->name?></label><br />

            <?php
        }else{

            ?>

            <label><input type="checkbox" name="tags[]"  value="<?=$data->id?>" > <?=$data->name?></label><br />


    <?php
        }

    }
    ?>


    <input type="hidden" name="hikeID" value="<?=$hike->id?>">
    <input type="submit" value="Modify">
</form>