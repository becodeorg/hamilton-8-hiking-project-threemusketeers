
<?php
$controller = new \Controllers\TagsController();
$datas =$controller->select();
?>
<form method="POST" action="/hikes/dashboard/update">
    <label for="name" > votre nom</label>
    <input type="text" name="name" value="<?=$hike->name?>" id="name">
    <label for="distance">  distance</label>
    <input type="number" value="<?=$hike->distance?>" name="distance" id="distance">
    <label for="duration">  duration</label>
    <input type="number" value="<?=$hike->duration?>" name="duration" id="duration">
    <label for="elevation_gain"> gain</label>
    <input type="number" name="elevation_gain"  value="<?=$hike->elevation_gain?>"id="elevation_gain">
    <label for="description"> description</label>
    <textarea id="description"  name="description"><?=$hike->description?>s</textarea>
    <select name="tags">
        <?php
        foreach ($datas as $data)
        {
            ?>
            <option  value="<?= $data->id?>"><?=$data->name?> </option>
            <?php
        }
        ?>
    </select>
    <input type="hidden" name="hikeID" value="<?=$hike->id?>">
    <input type="submit" value="modifier">
</form>