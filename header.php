<?php
session_start();
// include '../PhpConsole/__autoload.php';
// PhpConsole\Helper::register(); // it will register global PC class
include 'settings.php';


$conn = mysqli_connect($Settings['servername'], $Settings['dbUser'], $Settings['dbPass'], $Settings['dbName']);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
include 'user-dir.php';

if(isset($USER_DATA)){

// print_r($USER_DATA);
// print_r($Settings);

$UD = $Settings['url'].$USER_DATA['dir'];

// print_r($UD);

// print_r(__DIR__.'/'.$USER_DATA['dir']);

include __DIR__.'/'.$USER_DATA['dir'].'/projectSettings.php';

// print_r($projectSettings);

$CSS = $UD.$projectSettings['css']['stilius'];
// print_r($CSS);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?= $CSS ?>">    
    <title>Home</title>
</head>
<body>
<nav>
<ul id="bar">
<?php

$sql = "SELECT Username, id FROM users ORDER BY Username";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li class="menu menu-hover">
        <?php
       echo "<a class=\"button\">".$row['Username']."</a>";
       ?>
       <ul class="submenu">
  
       <?php

    $sql1 = "SELECT Antraste, id FROM pages WHERE UserID=".$row['id']."";
       $result1 = mysqli_query($conn, $sql1);
       
       if(mysqli_num_rows($result1) > 0) {
          while($row1 = mysqli_fetch_assoc($result1)) {
                   // echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
                   echo "<li><a href=\"?id=".$row1['id']."&User=".$row['Username']."\">".$row1['Antraste']."</a></li>";
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
    // $sql = "SELECT ImageID FROM images WHERE id = {$_GET['id']}";
   // $sql = "SELECT ImageID FROM images WHERE i WHERE PageID";

   // $result2 = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    


    $sql = "SELECT Antraste, Turinys FROM pages WHERE id = {$_GET['id']}";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     
            echo "<h1>{$row['Antraste']}</h1>";?>
            <br>
            <br>
            <?php
            $post = $row['Turinys'];
            
}
include 'img.php';

}


   }
?>
