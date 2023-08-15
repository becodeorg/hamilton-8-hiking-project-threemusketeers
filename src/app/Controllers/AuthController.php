<?php
declare(strict_types=1);

namespace App\Controllers;

use Exception;
use App\Models\User;
use App\Models\Database;


class AuthController
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register(string $firstNameInput, string $lastNameInput, string $nicknameInput, string $emailInput, string $passwordInput)
    {
        if (empty($firstNameInput) || empty($lastNameInput) || empty($nicknameInput) || empty($emailInput) || empty($passwordInput)) {
            throw new Exception('Form not completed.');
        }

        $firstName = htmlspecialchars($firstNameInput);
        $lastName = htmlspecialchars($lastNameInput);
        $nickname = htmlspecialchars($nicknameInput);
        $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
        $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);

        $user = (new User())->register_new_user($firstName, $lastName, $nickname, $email, $passwordHash);
        
        $session = (new User())->store_session($firstName, $lastName, $nickname, $email);
        

        http_response_code(302);
        header('location: /');
    }

    public function showRegistrationForm()
    {
        include 'app/Views/layout/header.view.php';
        include 'app/Views/register.view.php';
        include 'app/Views/layout/footer.view.php';
    }

    // public function login(string $usernameInput, string $passwordInput)
    // {
    //     if (empty($usernameInput) || empty($passwordInput)) {
    //         throw new Exception('Formulaire non complet');
    //     }

    //     $username = htmlspecialchars($usernameInput);

    //     $user = (new User())->login_user($usernameInput);

    //     if (empty($user)) {
    //         throw new Exception('Mauvais nom d\'utilisateur');
    //     }

    //     if (password_verify($passwordInput, $user['password']) === false) {
    //         throw new Exception('Mauvais mot de passe');
    //     }

    //     $session = (new User())->store_session($username, $user['email']);

    //     // Redirect to home page
    //     http_response_code(302);
    //     header('location: /');
    // }

    // public function showLoginForm()
    // {
    //     include 'views/layout/header.view.php';
    //     include 'views/login.view.php';
    //     include 'views/layout/footer.view.php';
    // }

    public function logout()
    {
        unset($_SESSION['user']);
        http_response_code(302);
        header('location: /');
    }
}