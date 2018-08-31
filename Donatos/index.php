<?php
session_start();
// include '../PhpConsole/__autoload.php';
// PhpConsole\Helper::register(); // it will register global PC class

$_SESSION['username'] = '';
$servername = "localhost";
$username = 'root';
$password = '123';

$conn = mysqli_connect($servername, $username, $password, 'wordpress2');
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
include 'header.php';
include 'footer.php';

?>
