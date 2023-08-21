<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Hiking Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <script src="https://kit.fontawesome.com/45ba28c0b3.js" crossorigin="anonymous"></script>
</head>
<body>

<style>
  body{
    padding : 50px 50px 0 50px;
  }
  i {
    padding : 5px;
  }
  .tag{
    background-color : #edf0f3; 
    border-radius : 10px; 
    padding: 5px;
    text-align: center;
    border : 1px solid #d9dadb;
  }
  #grid-solopage{
    margin-bottom: 25px;
  }
</style>

<nav>
  <ul>
    <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
    <li><strong>The Hiking Project.com</strong></li>
  </ul>
  <ul>
    <?php
      if($_SESSION["user"]){

        echo "<li>Hello, " . $_SESSION["user"]["nickname"] . "</li>";
        echo "<li><a href='/profile' role='button'> <i class='fa-solid fa-user'></i>   My profile</a></li>";
          echo "<li><a href='/favorite/index' role='button'>mes favoris</li>";
        if($_SESSION['user']['admin']==1)
        {
            echo "<li><a href='/users/gestion' role='button'>  gestion users</a></li>";
            echo "<li><a href='/tags/gestion' role='button'>  gestion tags</a></li>";
            echo "<li><a href='/hikes/dashboard/index' role='button'>  gestion hikes</a></li>";

        }else{
          echo "<li><a href='/myHikes' role='button'>My hikes</li>";



        }

          echo "<li><a href='/logout'><i class='fa-solid fa-right-from-bracket'></i></a></li>";
      }else{
        echo "<li><a href='/login'>Login</a></li>";
        echo "<li><a href='/register'>Register</a></li>";
      }
    ?>
  </ul>
</nav>
<main>