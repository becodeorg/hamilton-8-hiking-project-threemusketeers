<a href="/newHike" role="button">Create a new hike</a>

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

                        $HikesTagsController = new \App\Controllers\HikestagsController();
                        $datas =$HikesTagsController->find($hike->hikeID);


                        if (empty($datas))
                        {
                            echo "/";
                        }
                        foreach ($datas as $data)
                        {

                            echo $data->name."<br>" ;
                        }


                    ?>
                </td>
                <td><a href="/hikes/dashboard/show?name=<?=$hike->hikeName?>"><i class="fa-solid fa-eye"></i></a>-<a href="/hikes/dashboard/update?id=<?=$hike->hikeID?>"> <i class="fa-solid fa-pen-to-square"></i></a>-  <a href="/hikes/dashboard/delete?id=<?=$hike->hikeID?>"> <i class="fa-solid fa-trash"></i></a></td>
            </tr>


    <?php
        }
    ?>

    </tbody>
</table>