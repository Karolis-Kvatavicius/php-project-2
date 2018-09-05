<?php
session_start();
include '../settings.php';


//connect to server
$conn = new mysqli($Settings['servername'], $Settings['dbUser'], $Settings['dbPass']);

//select database
$db_selected = $conn->select_db($Settings['dbName']);

if (isset($_GET['do']) && $_GET['do'] == 'export') {


    $sql = "SELECT * FROM Pages";

    $result = $conn->query($sql);
    $t_0 = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $t_0[] = $row;
        }
    } 
    else {
        echo "Table is empty";
    }

    $t_1 = '';

    foreach ($t_0 as $val) {
        $t_1 .= "INSERT INTO Pages (Antraste, Turinys, UserID, Slug) 
        VALUES ('".addslashes($val['Antraste'])."', '".addslashes($val['Turinys'])."', '".addslashes($val['UserID'])."', '".addslashes($val['Slug'])."__');";
    }

    file_put_contents($_SESSION['username'].'-pages.sql', $t_1);

    
    $sql = "SELECT * FROM Images";

    $result = $conn->query($sql);
    $t_0 = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $t_0[] = $row;
        }
    } 
    else {
        echo "Table is empty";
    }
    
    //print_r($t_0);
    
    $t_1 = '';

    foreach ($t_0 as $val) {
        $t_1 .= "INSERT INTO Images (Nuoroda, PageId, ImageID, UserId ) 
        VALUES ('".addslashes($val['Nuoroda'])."', '".addslashes($val['PageID'])."', '".addslashes($val['ImageID'])."', '".addslashes($val['UserID'])."');";
    }

    file_put_contents($_SESSION['username'].'-images.sql', $t_1);



    
}
if (isset($_GET['do']) && $_GET['do'] == 'import') {

    $t_2 = file_get_contents($_GET['file']);
    $t_2 .= file_get_contents(str_replace('-pages', '-images', $_GET['file']));


    if ($conn->multi_query($t_2) === TRUE) {
        echo "{$_GET['file']} added successfully";
    } else {
        echo "Error: <br>" . $conn->error;
    }

}

if (isset($_GET['do']) && $_GET['do'] == 'migration') {
include 'migration_file.php';
echo "Migrated!";
}


if ($handle = opendir('.')) {
    echo '<div class="dir">';
    echo '<h2>Import pages:</h2>';
    while (false !== ($entry = readdir($handle))) {
            // echo '<a href="#">' .$entry. '</a><br>';
            if (preg_match('/pages\.sql/', $entry)) {
            echo '<a href="/migration/?do=import&file='.$entry.'">'.$entry.'</a><br>';
            }
    }
    closedir($handle);
    echo '<h2>Export your pages:</h2>';
    echo '<a href="/migration/?do=export"</a>Export<br>';
    echo '<h2>Make new migration:</h2>';
    echo '<a href="/migration/?do=migration"</a>Migrate<br>';
    echo '</div>';
}






