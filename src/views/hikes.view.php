
<?php
require 'src/Controllers/hikes.controller.php' ; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes</title>
</head>
<body>
    <h2>Hikes</h2>

    <?php if (!empty($hikes)): ?>
        <ul>
            <?php foreach ($hikes as $hike): ?>
                <li>
                    <a href="hike_details.php?id=<?= $hike['id'] ?>">
                        <?= $hike['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Look like there is no available hikes for the moment...</p>
    <?php endif; ?>
</body>
</html>
