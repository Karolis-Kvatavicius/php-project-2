<?php

//$dir = '..';
$dir = '.';
$user_directories = [];
$user_name = [];
$user_path = [];


$sql = "SELECT UserID, Username FROM pages INNER JOIN users ON pages.UserID=users.id WHERE pages.id=".($_GET['id']??0);
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
   $USER_DATA = mysqli_fetch_assoc($result);
   //print_r($row);



$di = new RecursiveDirectoryIterator($dir);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if(basename($file) == 'user.txt') {
    $user = ucfirst(strtolower(file_get_contents($file)));
    $path = preg_replace('/\\\\user.txt$/', '/', $filename);
    preg_match('/\w+\/$/', $path, $path2);
    $user_directories[$user] = $path2[0]; 
    }
}

//print_r($user_directories);
 
// $user_directories[$_GET['User']];

$USER_DATA['dir'] = $user_directories[$USER_DATA['Username']];


}