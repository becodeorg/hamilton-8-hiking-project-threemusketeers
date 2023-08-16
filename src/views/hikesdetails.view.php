    <h2><?= $hike['name'] ?></h2>

    <!--TAG TO MODIFY ? -->
    <div class="grid">
                <div class="tag">tag 1</div>
                <div class="tag">tag 2</div>
                <div class="tag">tag 3</div>
                <div class="tag">tag 4</div>
                <div class="tag">tag 5</div>
                <div class="tag">tag 6</div>
            </div>

    <ul>
        <li> <i class="fa-solid fa-person-hiking"></i>Distance: <?= $hike['distance'] ?> m</li>
        <li> <i class="fa-solid fa-clock"></i> Duration: <?= $hike['duration'] ?> min </li>
        <li> <i class="fa-solid fa-arrow-trend-up"></i> Elevation gain : <?= $hike['elevation_gain'] ?> m </li>
        <li> <i class="fa-solid fa-clock-rotate-left"></i> Last update : <?= $hike['updated_at'] ?> </li>
    </ul>
    <p>Description: <?= $hike['description'] ?></p>

    

    


