<?php
declare(strict_types=1);
namespace App\Controllers;
use PDO;
use PDOStatement;
use App\Models\Hikes;
use Exception;

class IndexController
{
    public function index(){     

        try {
            $data = new Hikes();
            $hikes = $data->getAllHikes();
            include 'app/Views/layout/header.view.php';
            include 'app/Views/index.view.php';
            include 'app/Views/layout/footer.view.php';
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

    }
}

try {
    //
} catch (\PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}
?>
