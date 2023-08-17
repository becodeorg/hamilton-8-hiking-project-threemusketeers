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
    <li><a href="index"><i class="fa-solid fa-house"></i></a></li>
    <li><strong>The Hiking Project.com</strong></li>
  </ul>
  <ul>
    <!--ADD THE USER NAME / NEED PROFILE DATA-->
    <li>Hello User<?php $name ?></li>
    <li><a href="#">Log-in</a></li>
    <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    <li><a href="#" role="button"> <i class="fa-solid fa-user"></i>   My profile</a></li> 
  </ul>
</nav>
<main>