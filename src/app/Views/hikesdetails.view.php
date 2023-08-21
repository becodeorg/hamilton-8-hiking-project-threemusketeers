    <h2><?= $hike['name'] ?></h2>

    <!--TAG TO MODIFY ? -->
    <div class="grid" id="grid-solopage">

        <?php

        $hikesTagsController = new \App\Controllers\HikestagsController();
        $tags =$hikesTagsController->find($hike['id']);
        foreach ($tags as $tag)
        {
            ?>
            <div class="tag"><?=$tag->name?></div>
            <?php
        }

        ?>
    </div>

    <ul>
        <li> <i class="fa-solid fa-person-hiking"></i>Distance: <?= $hike['distance'] ?> m</li>
        <li> <i class="fa-solid fa-clock"></i> Duration: <?= $hike['duration'] ?> min </li>
        <li> <i class="fa-solid fa-arrow-trend-up"></i> Elevation gain : <?= $hike['elevation_gain'] ?> m </li>
        <li> <i class="fa-solid fa-clock-rotate-left"></i> Last update : <?= $hike['updated_at'] ?> </li>
    </ul>
    <p>Description: <?= $hike['description'] ?></p>

    <?php 
    

    

    


