<?php
include '../settings.php';


    //connect to server
    $conn = new mysqli($Settings['servername'], $Settings['dbUser'], $Settings['dbPass']);

    //select database
    $db_selected = $conn->select_db($Settings['dbName']);

    // If can't connect, then create database
    if (!$db_selected) {
        $sql = "CREATE DATABASE ".$Settings['dbName'];
        $conn->query($sql);
        unset($sql);
        unset($conn);
        $conn = new mysqli($Settings['servername'], $Settings['dbUser'], $Settings['dbPass'], $Settings['dbName']); 
        
    } else {
        unset($conn);
        $conn = new mysqli($Settings['servername'], $Settings['dbUser'], $Settings['dbPass'], $Settings['dbName']); 
    }

    // delete tables if exist
    $sql = "DROP TABLE IF EXISTS Users;";
    $conn->query($sql);
    unset($sql);

    $sql = "DROP TABLE IF EXISTS Pages;";
    $conn->query($sql);
    unset($sql);

    $sql = "DROP TABLE IF EXISTS Images;";
    $conn->query($sql);
    unset($sql);
  
    //create USERS table
    $sql = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(30) NOT NULL,
    Slaptazodis VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
    );";

    //fill USERS table    
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Jonas', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Donata', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Marius', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Karolis', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Dainius', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Sarunas', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Nikolajus', '123');";
    $sql .= "INSERT INTO Users (Username, Slaptazodis)
    VALUES ('Arvydas', '123');";




    //create PAGES table
    $sql .= "CREATE TABLE Pages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Antraste VARCHAR(100) NOT NULL,
    Turinys LONGTEXT NOT NULL,
    UserID INT(30) NOT NULL,
    Slug VARCHAR(192) UNIQUE NOT NULL,
    reg_date TIMESTAMP
    );";

    //create IMAGES table
    $sql .= "CREATE TABLE Images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserID VARCHAR(50) NOT NULL,
    Pavadinimas VARCHAR(30) NOT NULL,
    Nuoroda TEXT NOT NULL,
    PageID INT(30) NOT NULL,
    ImageID INT(30) NOT NULL,
    reg_date TIMESTAMP
    );";
    if ($conn->multi_query($sql)) {
        // echo '<pre>';
        // var_dump($conn);
     } else {
        echo "Error creating database: " . mysqli_error($conn);
     }
     