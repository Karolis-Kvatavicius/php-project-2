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
$_SESSION['antraste'] = '';
$_SESSION['turinys'] = '';
$_SESSION['pageID'] = '';

$sql = "SELECT id FROM users WHERE Username='".$_SESSION['username']."'";
$userID = mysqli_fetch_assoc(mysqli_query($conn, $sql));
unset($sql);

if (isset($_GET['pageID'])) {
  $sql = "SELECT Antraste, Turinys FROM pages WHERE id='".$_GET['pageID']."'";
  $result = mysqli_query($conn, $sql);
  unset($sql);
  $_SESSION['pageID'] = $_GET['pageID'];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['antraste'] .= $row['Antraste'];
        $_SESSION['turinys'] .= $row['Turinys'];
        
    }
  } else {
    echo "No title";
  }
}

if(isset($_POST['upload-page'])) {
  $sql = "INSERT INTO pages (Antraste, Turinys, UserID)
  VALUES ('".$_POST['heading']."', '".$_POST['content']."', '".$userID['id']."')";

  if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
  } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
}

if(isset($_POST['update-page'])) {
  $sql = "UPDATE pages SET Turinys='".$_POST['content']."', Antraste='".$_POST['heading']."' WHERE id=".$_SESSION['pageID'];

  if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
  header('Location:http://localhost/php-project-2/Admin/index.php?pageID='.$_GET['pageID']);
  exit;
  
  
}

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
    <p class="button user"><?php echo $_SESSION['username']?></p>
    <ul class="submenu">
<?php 
//!!! use of undefined constant !!!
@$sql = "SELECT Antraste, id FROM pages WHERE UserID='".$userID[id]."'";
$result = mysqli_query($conn, $sql);
unset($sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
       echo "<li class=\"usersPages\"><a href=\"http://localhost/php-project-2/Admin/index.php?pageID=".$row['id']."\">".$row['Antraste']."</a></li>";
   }
} else {
   echo "<li><p>0 results</p></li>";
}
unset($result);
 ?>
    </ul>
  </li>
  <li class="menu menu-right menu-click">
    <a class="button" href="http://localhost/php-project-2/Admin/index.php?logout=true">Logout</a>
  </li>
</ul>
</nav>
</header>