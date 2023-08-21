<?php 

namespace App\Controllers;

use App\Models\Hikes;

use Exception;


class NewHikeController{

    public function showNewHikeForm()
    {   
    
        include 'app/Views/layout/header.view.php';
        include 'app/Views/newHike.view.php';
        include 'app/Views/layout/footer.view.php';

    }

    public function addNewHike($nameInput, $distanceInput, $durationInput, $elevation_gainInput, $descriptionInput, $userId, $created_at, $updated_at)
    {
        if (empty($nameInput) || empty($distanceInput) || empty($durationInput) || empty($elevation_gainInput) || empty($descriptionInput)) {
            throw new Exception('Form not completed.');
        }

        $name = htmlspecialchars($nameInput);
        $distance = filter_var($distanceInput, FILTER_SANITIZE_NUMBER_INT);
        $duration = filter_var($durationInput, FILTER_SANITIZE_NUMBER_INT);
        $elevation_gain = filter_var($elevation_gainInput, FILTER_SANITIZE_NUMBER_INT);
        $description = htmlspecialchars($descriptionInput);
        $userID = $userId;
        $createdAt = $created_at;
        $updatedAt = $updated_at;

        $hike = (new Hikes())->createNewHike($name, $distance, $duration, $elevation_gain, $description, $userID, $createdAt, $updatedAt);

        return $hike;
    }

    public function modifyHike($idHike, $nameInput, $distanceInput, $durationInput, $elevation_gainInput, $descriptionInput, $updated_at){

        if (empty($nameInput) || empty($distanceInput) || empty($durationInput) || empty($elevation_gainInput) || empty($descriptionInput)) {
            throw new Exception('Form not completed.');
        }

        $name = htmlspecialchars($nameInput);
        $distance = filter_var($distanceInput, FILTER_SANITIZE_NUMBER_INT);
        $duration = filter_var($durationInput, FILTER_SANITIZE_NUMBER_INT);
        $elevation_gain = filter_var($elevation_gainInput, FILTER_SANITIZE_NUMBER_INT);
        $description = htmlspecialchars($descriptionInput);
        $updatedAt = $updated_at;
        $id = $idHike;

        (new Hikes)->changeHikeInfo($id, $name, $distance, $duration, $elevation_gain, $description, $updatedAt);



    } 
    
}