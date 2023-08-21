<?php

$controller = new App\Controllers\TagsController();
$datas =$controller->select();

$hikeTagsController = new App\Controllers\HikestagsController();

?>
<form action="#" method="POST">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?=$hikeModify["name"]?>">
    </div>
    <div>
        <label for="distance">Distance(km)</label>
        <input type="number" id="distance" name="distance" value="<?=$hikeModify["distance"]?>">
    </div>
    <div>
        <label for="duration">Duration(minutes)</label>
        <input type="number" id="duration" name="duration" value="<?=$hikeModify["duration"]?>">
    </div>
    <div>
        <label for="elevation_gain">Elevation gain(meters)</label>
        <input type="number" id="elevation_gain" name="elevation_gain" value="<?=$hikeModify["elevation_gain"]?>">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description"value="<?=$hikeModify["description"]?>">
    </div>
    <input type="hidden" name="hikeID" value=<?=$hikeModify['id']?>>
    <p> Add tags</p>
    <?php
    foreach ($datas as $data)

    {

        if ( $hikeTagsController->isChecked($data->id,$hikeModify['id'])!= null)
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
    <button type="submit">Modify Hike</button>
</form>

