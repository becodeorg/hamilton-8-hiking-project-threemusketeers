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
    <button type="submit">Modify Hike</button>
</form>

