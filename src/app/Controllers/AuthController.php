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

    public function login(string $nicknameInput, string $passwordInput){
        if (empty($nicknameInput) || empty($passwordInput)) {
            throw new Exception('Form not completed.');
        }

        $username = htmlspecialchars($nicknameInput);

        $user = (new User())->login_find_user($nicknameInput);

        // var_dump($user);
        // die();
      

        // I need to find a better way to check/verify the user input 
        if (empty($user)) {
            throw new Exception('There\'s no user in our DataBase with that nickname.');
        }

        if (password_verify($passwordInput, $user['password']) === false) {
            throw new Exception('Wrong password.');
        }


        // First I need to get the user as an array with all the info inside

        $_SESSION['user'] = [
            'id' => $user['id'],
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'nickname' => $user['nickname'],
            'email' => $user['email'],
        ];
        
        // Redirect to home page
        http_response_code(302);
        header('location: /');
    }



    public function showLoginForm()
    {
        include 'app/Views/layout/header.view.php';
        include 'app/Views/login.view.php';
        include 'app/Views/layout/footer.view.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        http_response_code(302);
        header('location: /');
    }
}









////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////