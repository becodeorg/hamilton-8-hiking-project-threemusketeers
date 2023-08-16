<?php
declare(strict_types=1);

namespace Models;

use PDO;
use PDOStatement;
require_once 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

use Models\Database;

try {
    $db = new Database();

    $query = "SELECT `id`, `name` FROM Hikes";
    $stmt = $db->query($query);
    $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
<nav>
  <ul>
    <li><strong>YourHikes.com</strong></li>
  </ul>
  <ul>
    <li><a href="#">Log-in</a></li>
    <li><a href="#">Log-out</a></li>
    <li><a href="#" role="button">My profil</a></li>
  </ul>
</nav>

    <h2><h2>Let's discover new hikes</h2>

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
