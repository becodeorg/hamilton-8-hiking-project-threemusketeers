<?php

$userInfoArray = [];

foreach($displayCurrentUserProfile as $key=>$value){

    switch($key){
        case "firstName":
            $keyNewValue = "First name";
            $userInfoArray[$keyNewValue] = $value;
            break;
        case "lastName":
            $keyNewValue = "Last name";
            $userInfoArray[$keyNewValue] = $value;
        break;
        case "nickname":
            $keyNewValue = "Nickname";
            $userInfoArray[$keyNewValue] = $value;
            break;
        case "email":
            $keyNewValue = "Email";
            $userInfoArray[$keyNewValue] = $value;
        break;
        case "Password":
            $keyNewValue = "Password";
            $userInfoArray[$keyNewValue] = $value;
            break;

    }
}

?>


 <?php foreach($userInfoArray as $key=>$value): ?>

     <p><?= $key . ": " . $value ?></p>
       
 <?php endforeach; ?>


<a href="/modify">Modify</a>

    



