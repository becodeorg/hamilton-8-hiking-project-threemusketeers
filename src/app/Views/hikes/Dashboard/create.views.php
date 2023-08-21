
<?php
    $controller = new App\Controllers\TagsController();
    $datas =$controller->select();
?>
<form method="POST" action="/hikes/dashboard/create">
    <label for="name">  Name</label>
    <input type="text" name="name" id="name">
    <label for="distance">  Distance</label>
    <input type="number" name="distance" id="distance">
    <label for="duration">  Duration</label>
    <input type="number" name="duration" id="duration">
    <label for="elevation_gain"> Gain</label>
    <input type="number" name="elevation_gain" id="elevation_gain">
    <label for="description"> Description</label>
  <textarea id="description" name="description"></textarea>
    <p> Add tags</p>
        <?php
        foreach ($datas as $data)
        {
            ?>

            <label><input type="checkbox" name="tags[]"  value="<?=$data->id?>" > <?=$data->name?></label><br />

            <?php
        }
        ?>

    <input type="submit" value="save">
</form>