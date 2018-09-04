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
<?php

$sql = "SELECT Username, id FROM users";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li class="menu menu-hover">
        <?php
       echo "<a href=\"'.#.'\" class=\"button\">".$row['Username']."</a>";
       ?>
       <ul class="submenu">
  
       <?php

    $sql1 = "SELECT Antraste, id FROM pages WHERE UserID=".$row['id']."";
       $result1 = mysqli_query($conn, $sql1);
       
       if(mysqli_num_rows($result1) > 0) {
          while($row1 = mysqli_fetch_assoc($result1)) {
                   // echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
                   echo "<li><a href=\"?id=".$row1['id']."\">".$row1['Antraste']."</a></li>";
          }
       }
       ?>
       </ul>
       </li>
       <?php
    }
}
       ?>

 
        
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
