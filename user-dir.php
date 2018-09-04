<?php

$dir = '..';
$user_directories = [];
$user_name = [];
$user_path = [];


$di = new RecursiveDirectoryIterator($dir);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if(basename($file) == 'user.txt') {
    $user = ucfirst(strtolower(file_get_contents($file)));
    $path = preg_replace('/\\\\user.txt$/', '/', $filename);
    preg_match('/\w+\/$/', $path, $path2);
    $user_directories[$user] = $path2[0]; 
    }
}
print_r($user_directories);
// $user_directories[$_GET['User']];