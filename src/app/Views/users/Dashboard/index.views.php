<table>
<thead>
<tr>
    <th>firstName</th>
    <th>lastName</th>
    <th>email</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php
foreach ($users as $user){

    ?>
    <tr>
        <td><?=$user->firstName?></td>
        <td><?=$user->lastName?></td>
        <td><?=$user->email?></td>
        <td><a href="/users/gestion/update?id=<?=$user->id?>"> Modifier</a>-
            <a href=/users/gestion/delete?id=<?=$user->id?>> supprimer</a> -
            <a href=/users/gestion/deleteAll?id=<?=$user->id?>> supprimer user et Hikes</a>
        </td>
    </tr>


    <?php
}
?>

</tbody>
</table>
