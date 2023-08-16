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
