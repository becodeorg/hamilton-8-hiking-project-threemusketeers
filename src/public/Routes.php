<?php
require_once 'Router.php';


$router = new Router();


//$router->get('/', 'IndexController@index');
$router->get('/login','authController@showLoginForm');
$router->get('/hikesUser','HikesDetailsController@display_user_hikes');
$router->get('/users/gestion','usersController@usersIndex');
//$router->get('/profile','HikesDetailsController@display_user_hikes');
$router->post('/auth/login','authController@login');
/*$router->get('/register','_authController@showRegistrationForm');*/

