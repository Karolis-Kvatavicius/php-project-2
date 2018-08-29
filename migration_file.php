<?php

    //Prisijungimai
    $servername = "localhost";
    $username = "root";
    $password = "123";

    //connect to server
    $conn = mysqli_connect($servername, $username, $password);

    //select database
    $db_selected = mysqli_select_db($conn, 'wordpress2');

    // If can't connect, then create database
    if (!$db_selected) {
        $sql = 'CREATE DATABASE wordpress2';
        mysqli_query($conn, $sql);
        unset($sql);
        unset($conn);
        $conn = mysqli_connect($servername, $username, $password, 'wordpress2'); 
        
    } else {
        unset($conn);
        $conn = mysqli_connect($servername, $username, $password, 'wordpress2'); 
    }

    // delete tables if exist
    $sql = "DROP TABLE IF EXISTS Users;";
    $sql .= "DROP TABLE IF EXISTS Pages;";
    $sql .= "DROP TABLE IF EXISTS Images;";
  
    //create USERS table
    $sql .= "CREATE TABLE Users (
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

    //create PAGES table
    $sql .= "CREATE TABLE Pages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Antraste VARCHAR(30) NOT NULL,
    Turinys VARCHAR(15) NOT NULL,
    UserID INT(30) NOT NULL,
    reg_date TIMESTAMP
    );";

    //create IMAGES table
    $sql .= "CREATE TABLE Images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Pavadinimas VARCHAR(30) NOT NULL,
    Nuoroda VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
    );";
    mysqli_multi_query($conn, $sql);