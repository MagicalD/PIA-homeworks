<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "user_info";
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if(!$conn){
    echo "Conection failed".mysqli_connect_error();
}
?>