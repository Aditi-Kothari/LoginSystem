<?php
require "nav.php";
session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     header("location:login.php");
     exit;
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="box"><a href="logout.php">Log Out</a></div>
        <h3 style="color:white;" class="para">Welcome - <?php  echo $_SESSION['username']?></h3>
        <h3 class="para">Let's Experience Your Journey to FoodFur !!</h3>
        </div>
</body>
</html>