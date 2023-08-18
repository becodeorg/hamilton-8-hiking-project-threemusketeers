<a href="/hikes/dashboard/create">Creer</a>
<a href="/tags/dashboard/create">Creer un nouveau tag</a>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Distance</th>
        <th>Gain</th>
        <th>Tag</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($hikes as $hike){
            ?>
            <tr>
                <td><?=$hike->hikeName?></td>
                <td><?=$hike->distance?></td>
                <td><?=$hike->elevation_gain?></td>
                <td>
                    <?php


                        $HikesTagsController =  new App\Controllers\HikestagsController();

                        $datas =$HikesTagsController->find($hike->hikeID);

                        var_dump($datas);
                        die();

                        foreach ($datas as $data)
                        {
                            echo $data->name."<br>" ;
                        }


                    ?>
                </td>
                <td><a href="/hikes/dashboard/show?name=<?=$hike->hikeName?>">voir</a>-<a href="/hikes/dashboard/update?id=<?=$hike->hikeID?>"> Modifier</a>-  <a href="/hikes/dashboard/delete?id=<?=$hike->hikeID?>"> supprimer</a></td>
            </tr>


    <?php
        }
    ?>

    </tbody>
</table>