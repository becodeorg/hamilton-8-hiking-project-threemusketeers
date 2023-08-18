
<?php
$controller = new \Controllers\TagsController();
$datas =$controller->select();
?>
<form method="post" action="http://localhost:3000/users/gestion/update">
    <label for="firstName" >le prenom</label>
    <input type="text" name="firstName" value="<?=$user->firstName?>" id="name">
    <label for="lastName"> le no </label>
    <input type="text" value="<?=$user->lastName?>" name="lastName" id="lastName">
    <label for="email"> l'email</label>
    <input type="text" value="<?=$user->email?>" name="email" id="email">

    <input type="hidden" name="userID" value="<?=$user->id?>">
    <input type="submit" value="modifier">
</form>