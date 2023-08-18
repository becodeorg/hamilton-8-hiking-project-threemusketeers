<?php 

namespace App\Controllers;

use App\Models\Hikes;

use Exception;


class NewHike{

    public function showNewHikeForm()
    {   
    
        include 'app/Views/layout/header.view.php';
        include 'app/Views/newHike.view.php';
        include 'app/Views/layout/footer.view.php';

    }

    public function addNewHike(string $nameInput, int $distanceInput, int $durationInput, int $elevation_gainInput, string $descriptionInput, $userId)
    {
        if (empty($nameInput) || empty($distanceInput) || empty($durationInput) || empty($elevation_gainInput) || empty($descriptionInput)) {
            throw new Exception('Form not completed.');
        }

        $name = htmlspecialchars($nameInput);
        $distance = htmlspecialchars($nameInput);
        $duration = htmlspecialchars($nameInput);
        $elevation_gain = htmlspecialchars($nameInput);
        $description = htmlspecialchars($descriptionInput);
        $userID = $userId;

        $hike = (new Hikes())->createNewHike($name, $distance, $duration, $elevation_gain, $description, $userID);
        
        http_response_code(302);
        header('location: /hikesUser');
    }

}