<!--For the details-->
<?php

declare(strict_types=1);

namespace Models;
use PDO;
use PDOStatement;

require_once __DIR__ . '/../src/Models/Database.php';

use Models\Database;
error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    $db = new Database();
    var_dump($Hikes);

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