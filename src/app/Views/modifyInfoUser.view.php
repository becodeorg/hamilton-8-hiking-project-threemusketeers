<?php

use App\Models\User;

$userInfo = (new User())->find_user($_SESSION["user"]["nickname"]);

?>


<form action="#" method="post">
    <div>
        <label for="firstName">First name</label>
        <input type="text" id="firstName" name="firstName" value=<?= $userInfo["firstName"]?>>
    </div>
    <div>
        <label for="lastName">Last name</label>
        <input type="text" id="lastName" name="lastName" value=<?= $userInfo["lastName"]?>>
    </div>
    <div>
        <label for="nickname">Nickname</label>
        <input type="text" id="nickname" name="nickname" value=<?= $userInfo["nickname"]?>>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value=<?=$userInfo["email"]?>>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>
   
    <button type="submit">Modify!</button>
</form>