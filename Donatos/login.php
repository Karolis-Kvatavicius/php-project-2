<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <title>Login</title>
    <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
</head>
<body>
  
    <div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
    <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
    <div style = "margin:30px">
    <form action = "login.php" method = "post" >
    <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
    <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
   
    <br>
    <br>
     <input id = "input2" type="submit" name ="login" value="LOGIN">
     </div>
     </div>
     </div>
     </div>
     

    </form>
    </body>
    </html>