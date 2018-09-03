<?php
include 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Hello</h1>
    <p>puslapis is nuorodos</p>

   <?php
    $sql = "SELECT Antraste, Turinys FROM pages";
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
?>


</body>
</html>