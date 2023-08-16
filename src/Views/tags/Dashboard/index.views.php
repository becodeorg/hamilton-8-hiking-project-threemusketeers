
<a href="/tags/dashboard/create">Creer un nouveau tag</a>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($tags as $tag){

        ?>
        <tr>
            <td><?=$tag->name?></td>
            <td><a href="/tags/update?id=<?=$tag->id?>"> Modifier</a>-  <a href="#"> supprimer</a></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>