<?php 
session_start();

if(isset($_GET['logout']) && $_GET['logout'] == true) {
  session_destroy();
  header('Location:http://localhost/php-project-2/Donatos/index.php');
  exit;
}

if(!isset($_SESSION['sesija']) && $_SESSION['sesija'] != true) {
  session_destroy();
  header('Location:http://localhost/php-project-2/Donatos/index.php');
  exit;
}

$servername = "localhost";
$username = "root";
$password = "123";

$conn = mysqli_connect($servername, $username, $password, 'wordpress2');
?>
<!DOCTYPE html5>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
<header>    
<nav>
<ul id="bar">
  <li class="menu menu-hover">
    <a href="#" class="button"><?php echo $_SESSION['username']?></a>
    <ul class="submenu">
<?php 
//patobulint uzklausa, kad imtu tik prisijungusio zmogaus dizainus is db
$sql = "SELECT Antraste FROM Pages";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
       echo "<li><a href=".'#'.">".$row['Antraste']."</a></li>";
   }
} else {
   echo "<li><p>0 results</p></li>";
}
 ?>
    </ul>
  </li>
  <li class="menu menu-right menu-click">
    <a class="button" href="http://localhost/php-project-2/Admin/index.php?logout=true">Logout</a>
  </li>
</ul>
</nav>
</header>