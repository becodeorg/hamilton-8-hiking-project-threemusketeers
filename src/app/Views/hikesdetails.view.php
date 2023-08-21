
<h2><?= $hike['name'] ?></h2>

    <!--TAG TO MODIFY ? -->
    <div class="grid" id="grid-solopage">

        <?php

        $hikesTagsController = new \App\Controllers\HikestagsController();
        $tags =$hikesTagsController->find($hike['HikesID']);
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

        if(!is_null($_SESSION['user']))
        {
            if (is_null($hike['hike']))
            {
                ?>
                <a href="favorite?hikeID=<?=$hike['HikesID']?>">Mettre en favoris</a>
                <?php
            }else{

                ?>
                <a href="/favorite/delete?hikeID=<?=$hike['HikesID']?>">retirer des  favoris</a>
                <?php
            }
            ?>

    <?php
        }
    ?>


    

    


