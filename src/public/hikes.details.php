<?php
declare(strict_types=1);

namespace Models;

use PDO;
use PDOStatement;

require_once __DIR__ . '/../src/Models/Database.php';

use Models\Database;

try {
    $db = new Database();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT `id`, `name`, `description`, `distance` FROM Hikes WHERE `id` = :id";
        $stmt = $db->query($query, [':id' => $id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
        exit();
    }
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
    <title>Hike Details</title>
</head>
<body>
    <?php if (!empty($hike)): ?>
        <h2><?= $hike['name'] ?></h2>
        <p>Description: <?= $hike['description'] ?></p>
        <p>Distance: <?= $hike['distance'] ?> m</p>
    <?php else: ?>
        <p>Sorry, no details available for this hike.</p>
    <?php endif; ?>
</body>
</html>
