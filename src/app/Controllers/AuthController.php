<?php
declare(strict_types=1);

namespace App\Controllers;

require_once 'vendor/autoload.php';

use Exception;
use App\Models\User;
use App\Models\Database;
use App\Models\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;


class AuthController
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function showRegistrationForm()
    {
        include 'app/Views/layout/header.view.php';
        include 'app/Views/register.view.php';
        include 'app/Views/layout/footer.view.php';
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
     
         // Send registration email
        $this->sendRegistrationEmail($email, $firstName);

        $session = (new User())->store_session($firstName, $lastName, $nickname, $email);
            
        http_response_code(302);
        header('location: /hikesUser');
    }

    public function sendRegistrationEmail($email, $firstName) {

        $mail = new PHPMailer;
    
        try {
            // SMTP settings
            $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hikingappbecode@gmail.com';
            $mail->Password = 'ouorpsrfzlsktuph';
            $mail->SMTPSecure = "tls"; 
            $mail->Port = 587; 
    
            // Email content
            $mail->setFrom('hikingappbecode@gmail.com', 'Hiking app team');
            $mail->addAddress($email, $firstName);
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Our Hiking app!';
            $mail->Body = "<b>Hello, you have successfully created an account in our Hiking app.</b>";
    
            $mail->send();
        } catch (PHPMailerException $e) {
            return $mail->ErrorInfo;
        }
    }

    public function login(string $nicknameInput, string $passwordInput){
        if (empty($nicknameInput) || empty($passwordInput)) {
            throw new Exception('Form not completed.');
        }

        $username = htmlspecialchars($nicknameInput);
        
        $user = (new User())->find_user($username);
        
        if (empty($user)) {
            throw new Exception('There\'s no user in our DataBase with that nickname.');
        }

        

        if (password_verify($passwordInput, $user['password']) === false) {
            throw new Exception('Wrong password.');
        }

        
        $_SESSION['user'] = [
            'id' => $user['id'],
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'nickname' => $user['nickname'],
            'email' => $user['email'],
            'admin' =>  $user['admin'],
        ];
        
        // Redirect to home page
        http_response_code(302);
        header('location: /hikesUser');
    }


    public function showLoginForm()
    {
        include 'app/Views/layout/header.view.php';
        include 'app/Views/login.view.php';
        include 'app/Views/layout/footer.view.php';
    }

    public function modifyUser(string $firstNameInput, string $lastNameInput, string $nicknameInput, string $emailInput){

        if (empty($firstNameInput) || empty($lastNameInput) || empty($nicknameInput) || empty($emailInput)) {
            throw new Exception('Form not completed.');
        }

        $firstName = htmlspecialchars($firstNameInput);
        $lastName = htmlspecialchars($lastNameInput);
        $nickname = htmlspecialchars($nicknameInput);
        $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
        
        $modUser = (new User())->change_user_info($_SESSION["user"]["id"], $firstName, $lastName, $nickname, $email);

        $user = (new User())->find_user_byId($_SESSION["user"]["id"]);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'nickname' => $user['nickname'],
            'email' => $user['email'],
        ];
    
        http_response_code(302);
        header('location: /profile');
    }

    public function showModifyForm(){

        include 'app/Views/layout/header.view.php';
        include "app/Views/modifyInfoUser.view.php";
        include 'app/Views/layout/footer.view.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        http_response_code(302);
        header('location: /');
    }

    public function verification($id)
    {

        $auth = new Auth();
        $hikes_has_user = $auth->verification($id);

        if ($hikes_has_user->user_id == $_SESSION['user']['id'])
        {
            return true;
        }else{
            return false;
        }


    }
}

