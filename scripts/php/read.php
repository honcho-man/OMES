<?php

 if (isset($_SESSION['username'])){ 
    $currentusername = $_SESSION['username'];

    require "C:/xampp/htdocs/OMES/scripts/php/config.php";
    

   
$sql = "SELECT firstname FROM user WHERE username = '" . $currentusername . "'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
 }
 ?>
