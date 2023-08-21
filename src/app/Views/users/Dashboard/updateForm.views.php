
<?php
$controller = new App\Controllers\TagsController();

$datas =$controller->select();
?>
<form method="POST" action="/users/gestion/update">
    <label for="firstName" >First Name</label>
    <input type="text" name="firstName" value="<?=$user->firstName?>" id="name">
    <label for="lastName"> Last Name </label>
    <input type="text" value="<?=$user->lastName?>" name="lastName" id="lastName">
    <label for="email"> Mail</label>
    <input type="text" value="<?=$user->email?>" name="email" id="email">

    <input type="hidden" name="userID" value="<?=$user->id?>">
    <input type="submit" value="modify">
</form>