<?php
if(isset($_GET['logout']) && $_GET['logout'] == true) {
   session_destroy();
}
$_SESSION['username'] = '';
$servername = "localhost";
$username = 'root';
$password = '123';
$conn = mysqli_connect($servername, $username, $password, 'wordpress2');
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
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
  <li class="menu menu-hover">
    <a href="#" class="button">Mariaus</a>
    <ul class="submenu">
      <li><a href="http://localhost/PHP-project-2/Mariaus/saras.html">Šaras</a></li>
      <li><a href="#">Menu item 2</a></li>
      <li><a href="#">Menu item 3</a></li>
      <li><a href="#">Menu item 4</a></li>
    </ul>
  </li>
  <li class="menu menu-hover">
    <a href="#" class="button">Dainiaus</a>
    <ul class="submenu">
      <li><a href="#">Menu item 1</a></li>
      <li><a href="#">Menu item 2</a></li>
      <li><a href="#">Menu item 3</a></li>
      <li><a href="#">Menu item 4</a></li>
    </ul>
  </li>
  <li class="menu menu-hover">
    <a href="#" class="button">Šaruno</a>
    <ul class="submenu">
      <li><a href="#">Menu item 1</a></li>
      <li><a href="#">Menu item 2</a></li>
      <li><a href="#">Menu item 3</a></li>
      <li><a href="#">Menu item 4</a></li>
    </ul>
  </li>
  <li class="menu menu-hover">
    <a href="#" class="button">Nikolajaus</a>
    <ul class="submenu">
      <li><a href="#">Menu item 1</a></li>
      <li><a href="#">Menu item 2</a></li>
      <li><a href="#">Menu item 3</a></li>
      <li><a href="#">Menu item 4</a></li>
    </ul>
  </li>
  <li class="menu menu-right menu-click">
    <a class="button" href="http://localhost/php-project-2/Donatos/login.php">Login</a>
  </li>
</ul>
  </nav>