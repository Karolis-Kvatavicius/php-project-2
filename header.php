<?php
session_start();
// include '../PhpConsole/__autoload.php';
// PhpConsole\Helper::register(); // it will register global PC class
include 'settings.php';

$conn = mysqli_connect($Settings['servername'], $Settings['dbUser'], $Settings['dbPass'], $Settings['dbName']);
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
    <?php
    $sql = "SELECT Antraste FROM pages WHERE UserID='1'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
}
?>
 </ul>
  </li>
  <li class="menu menu-hover">
     <a href="#" class="button">Donatos</a>
    <ul class="submenu">
    <?php
    $sql = "SELECT Antraste, id FROM pages WHERE UserID='2'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
        //    echo "<li><a href='details.php?id=".$row['id'].">".$row['Antraste']."</a></li>";
        //     echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";

        echo "<li><a href=\"?id=".$row['id']."\">".$row['Antraste']."</a></li>";
   }
}
    

 
?>
   </ul>
  </li>
  <li class="menu menu-hover">
     <a href="#" class="button">Mariaus</a>
    <ul class="submenu">
    <?php
    $sql = "SELECT Antraste FROM pages WHERE UserID='3'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
}
?>
    </ul>
  </li>
  <li class="menu menu-hover">
     <a href="#" class="button">Karolio</a>
    <ul class="submenu">
    <?php
    $sql = "SELECT Antraste FROM pages WHERE UserID='4'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
}
?>
    </ul>
  </li>
  <li class="menu menu-hover">
    <a href="#" class="button">Dainiaus</a>
    <ul class="submenu">
    <?php
    $sql = "SELECT Antraste FROM pages WHERE UserID='5'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
} 
?>
    </ul>
  </li>
  <li class="menu menu-hover">
    <a href="#" class="button">Šaruno</a>
    <ul class="submenu">
    <?php
    $sql = "SELECT Antraste FROM pages WHERE UserID='6'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
} 
?>
    </ul>
  </li>
  <li class="menu menu-hover">
    <a href="#" class="button">Nikolajaus</a>
    <ul class="submenu">
    <?php
    $sql = "SELECT Antraste FROM pages WHERE UserID='7'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
}
?>
    </ul>
  </li>
  <li class="menu menu-right menu-click">
    <a class="button" href="<?= $Settings['url']?>login.php">Login</a>
  </li>
</ul>
  </nav>



   <?php
   if(isset($_GET['id'])){
    $sql = "SELECT Antraste, Turinys FROM pages WHERE id = {$_GET['id']}";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     
            echo "<h1>{$row['Antraste']}</h1>";?>
            <br>
            <br>
            <?php
            echo "<p>{$row['Turinys']}</p>";
}
}
   }
?>
