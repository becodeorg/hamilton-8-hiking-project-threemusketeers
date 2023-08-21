
<a href="/tags/dashboard/create" role="button">Ceate a new tag</a>
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
            <td><a href="/tags/update?id=<?=$tag->id?>"> <i class="fa-solid fa-pen-to-square"></i></a>-  <a href="/tags/delete?id=<?=$tag->id?>"> <i class="fa-solid fa-trash"></i></a></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>