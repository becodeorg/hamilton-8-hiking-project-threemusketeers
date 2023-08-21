<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Remove from favourites</th>
    </tr>
    </thead>
    <tbody>
    <?php



    foreach ( $favorites as $favorite){


        ?>
        <tr>
            <td><?=$favorite->name?></td>
            <td><a href="/favorite/delete?hikeID=<?=$favorite->id?>"><i class="fa-solid fa-trash"></i></a> </td>
        </tr>

        <?php
    }
    ?>

    </tbody>
</table>
