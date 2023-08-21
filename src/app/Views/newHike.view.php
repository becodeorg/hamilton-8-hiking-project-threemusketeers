<?php
$controller = new App\Controllers\TagsController();
$datas =$controller->select();
?>
<form action="" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name"/>
    </div>
    <div>
        <label for="distance">Distance(kilometers)</label>
        <input type="number" id="distance" name="distance"/>
    </div>
    <div>
        <label for="duration">Duration(minutes)</label>
        <input type="number" id="duration" name="duration"/>
    </div>
    <div>
        <label for="elevation_gain">Elevation gain(meters)</label>
        <input type="number" id="elevation_gain" name="elevation_gain"/>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description"/>
    </div>
    <p> Add tags</p>
    <?php
    foreach ($datas as $data)
    {
        ?>

        <label><input type="checkbox" name="tags[]"  value="<?=$data->id?>" > <?=$data->name?></label><br />

        <?php
    }
    ?>
    <button type="submit">Create</button>
</form>