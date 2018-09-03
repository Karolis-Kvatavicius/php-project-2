<?php 
session_start();


$conn = mysqli_connect($Settings['servername'], $Settings['dbUser'], $Settings['dbPass'], $Settings['dbName']);
$_SESSION['antraste'] = '';
$_SESSION['turinys'] = '';
$_SESSION['pageID'] = '';
$_SESSION['nuoroda'] = '';

$sql = "SELECT id FROM users WHERE Username='".$_SESSION['username']."'";
$userID = mysqli_fetch_assoc(mysqli_query($conn, $sql));
unset($sql);

if (isset($_GET['pageID'])) {
  $sql = "SELECT Antraste, Turinys FROM pages WHERE id='".$_GET['pageID']."';";
  $result = mysqli_query($conn, $sql);
  $_SESSION['pageID'] = $_GET['pageID'];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['antraste'] .= $row['Antraste'];
        $_SESSION['turinys'] .= $row['Turinys'];   
    }
  } else {
    echo "No title";
  }
  unset($sql);
  unset($result);

  $sql = "SELECT Nuoroda FROM images WHERE PageID='".$_GET['pageID']."';";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['nuoroda'] .= $row['Nuoroda'];   
    }
  } else {
    echo "No title";
  }
  unset($sql);
  unset($result);
}

if(isset($_POST['upload-page'])) {
  include 'fileUpload.php';
  //add slug
  //INSERT INTO pages (... , Slug)
  //slugify($_POST['heading']);
  //tas pats ir su update
  $sql = "INSERT INTO pages (Antraste, Turinys, UserID)
  VALUES ('".$_POST['heading']."', '".$_POST['content']."', '".$userID['id']."');";
  $_SESSION['antraste'] = $_POST['heading'];
  $_SESSION['turinys'] = $_POST['content'];
  $_SESSION['nuoroda'] = $target_file;
  if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
  } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  unset($sql);
  $sql = "SELECT id FROM pages WHERE Antraste='".$_SESSION['antraste']."'";
  $pageID = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  unset($sql);
  $sql ="INSERT INTO images (Pavadinimas, Nuoroda, PageID)
  VALUES ('".$_SESSION['antraste']."', '".$target_file."', '".$pageID['id']."');";
  $_SESSION['pageID'] = $pageID['id'];
  if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
  } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  $sql ="INSERT INTO pages (Pavadinimas, Nuoroda, PageID)
  VALUES ('".$_SESSION['antraste']."', '".$target_file."', '".$pageID['id']."');";
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  header('Location:'.$Settings['url'].'Admin/index.php?pageID='.$_SESSION['pageID']);
  exit;
}


if(isset($_POST['update-page'])) {
  include 'fileUpload.php';
  $sql = "SELECT id FROM pages WHERE Antraste='".$_SESSION['antraste']."'";
  $pageID = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  unset($sql);
  $_SESSION['pageID'] = $pageID['id'];

  $sql = "UPDATE pages SET Turinys='".$_POST['content']."', Antraste='".$_POST['heading']."' WHERE id=".$_SESSION['pageID'];
  $_SESSION['antraste'] = $_POST['heading'];
  $_SESSION['turinys'] = $_POST['content'];
  
  if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
  unset($sql);

  $sql = "UPDATE images SET Nuoroda='".$target_file."' WHERE PageID=".$_SESSION['pageID'];
  $_SESSION['nuoroda'] = $target_file;
  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
  header('Location:'.$Settings['url'].'Admin/index.php?pageID='.$_SESSION['pageID']);
  exit;
 
}

if(isset($_POST['DeletePage'])) {

$sql = "DELETE FROM pages WHERE id=".$_SESSION['pageID'];
if (mysqli_query($conn, $sql)) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . mysqli_error($conn);
}

$sql = "DELETE FROM images WHERE id=".$_SESSION['pageID'];
if (mysqli_query($conn, $sql)) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . mysqli_error($conn);
}

header('Location:'.$Settings['url'].'Admin/index.php');
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
    <link rel="stylesheet" type="text/css" media="screen" href="<?= $projectSettings['css']['stilius']?>">
</head>
<body>
<header>    
<nav>
<ul id="bar">
  <li class="menu menu-hover">
    <p class="button user"><?php echo $_SESSION['username']?></p>
    <ul class="submenu">
<?php 
$sql = "SELECT Antraste, id FROM pages WHERE UserID='".$userID['id']."'";
$result = mysqli_query($conn, $sql);
unset($sql);

if(mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
       echo "<li class=\"usersPages\"><a class=\"pagesLinks\" href=\"".$Settings['url']."Admin/index.php?pageID=".$row['id']."\">".$row['Antraste']."</a></li>";
   }
} else {
   echo "<li><p>0 results</p></li>";
}
unset($result);
 ?>
    </ul>
  </li>
  <li class="menu menu-right menu-click">
    <a class="button logout" href="<?php echo $Settings['url']?>index.php?logout=true">Logout</a>
  </li>
</ul>
</nav>
</header>