<table>
    <thead>
    <tr>
        <th>nom du hike</th>
        <th>actions</th>
    </tr>
    </thead>
    <tbody>
    <?php



    foreach ( $favorites as $favorite){


        ?>
        <tr>
            <td><?=$favorite->name?></td>
            <td><a href="/favorite/delete?hikeID=<?=$favorite->id?>">supprimer des favoris</a> </td>
        </tr>

        <?php
    }
    ?>

    </tbody>
</table>
