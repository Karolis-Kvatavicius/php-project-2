<?php
session_start();
if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_destroy();
    header('Location:http://localhost/php-project-2/Donatos/login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Pages</title>
</head>
<body>
<nav>
<ul id="bar">
  <li class="menu menu-hover">
    <a href="#" class="button">Jono</a>  
    <ul class="submenu">
      <li><a href="#">Menu item 1</a></li>
      <li><a href="#">Menu item 2</a></li>
      <li><a href="#">Menu item 3</a></li>
      <li><a href="#">Menu item 4</a></li>
    </ul>
  </li>

   <li class="menu menu-right menu-click">
    <a class="button" href="http://localhost/php-project-2/Donatos/login.php">Logout</a>
    </li>
</nav>