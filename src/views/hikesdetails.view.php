    <h2><?= $hike['name'] ?></h2>
    <ul>
        <li> <i class="fa-solid fa-person-hiking"></i>Distance: <?= $hike['distance'] ?> m</li>
        <li> <i class="fa-solid fa-clock"></i> Duration: <?= $hike['duration'] ?> min </li>
        <li> <i class="fa-solid fa-arrow-trend-up"></i> Elevation gain : <?= $hike['elevation_gain'] ?> m </li>
        <li> <i class="fa-solid fa-clock-rotate-left"></i> Last update : <?= $hike['updated_at'] ?> </li>
    </ul>
    <p>Description: <?= $hike['description'] ?></p>
    


