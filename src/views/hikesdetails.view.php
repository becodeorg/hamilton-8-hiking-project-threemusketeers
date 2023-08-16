    <h2><?= $hike['name'] ?></h2>

    <ul>
          <!--TAG TO MODIFY ? -->
        <li>
            <div class="grid">
                <div>tag 1</div>
                <div>tag 2</div>
                <div>tag 3</div>
                <div>tag 4</div>
            </div>
        </li>
        <li> <i class="fa-solid fa-person-hiking"></i>Distance: <?= $hike['distance'] ?> m</li>
        <li> <i class="fa-solid fa-clock"></i> Duration: <?= $hike['duration'] ?> min </li>
        <li> <i class="fa-solid fa-arrow-trend-up"></i> Elevation gain : <?= $hike['elevation_gain'] ?> m </li>
        <li> <i class="fa-solid fa-clock-rotate-left"></i> Last update : <?= $hike['updated_at'] ?> </li>
    </ul>
    <p>Description: <?= $hike['description'] ?></p>
    


