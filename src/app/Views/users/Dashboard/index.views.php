<table>
<thead>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Mail</th>
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
        <td><a href="/users/gestion/update?id=<?=$user->id?>"> Modify</a>
            <span> / </span>
            <a href=/users/gestion/delete?id=<?=$user->id?>> <i class="fa-solid fa-trash"></i></a> -
            <a href=/users/gestion/deleteAll?id=<?=$user->id?>> <i class="fa-solid fa-trash"></i>User and Hikes</a>
        </td>
    </tr>


    <?php
}
?>

</tbody>
</table>
