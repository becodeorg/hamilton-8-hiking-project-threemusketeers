<?php
declare(strict_types=1);
namespace Controllers;
use PDO;
use PDOStatement;
use Models\Hikes;

class IndexController
{
    public function index()
    {
        try {
            $data = new Hikes();
            $hikes = $data->getAllHikes();
            include '../views/layout/header.view.php';
            include '../views/index.view.php';
            include '../views/layout/footer.view.php';
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}

try {
    //
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}
?>
