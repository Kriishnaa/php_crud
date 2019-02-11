<?php
$host_name = "localhost";
$user_name = "root";
$pw = "";
$db_name = "krishna";
$conn = mysqli_connect($host_name,$user_name,$pw,$db_name);
if(!$conn){
    die("Failed to connect for database". mysqli_error($conn));
}
?>