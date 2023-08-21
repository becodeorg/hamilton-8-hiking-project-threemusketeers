
<a href="/tags/dashboard/create" role="button">Create a new Tag</a>
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
            <td><a href="/tags/update?id=<?=$tag->id?>"> Modify</a><span> - </span><a href="/tags/delete?id=<?=$tag->id?>"> Delete</a></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>