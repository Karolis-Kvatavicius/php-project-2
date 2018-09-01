<?php
session_start();
// include '../PhpConsole/__autoload.php';
// PhpConsole\Helper::register(); // it will register global PC class
include '../settings.php';

$conn = mysqli_connect($Settings['servername'], $Settings['dbUser'], $Settings['dbPass'], $Settings['dbName']);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
include 'header.php';
include 'footer.php';

?>
