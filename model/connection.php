<?php
$host = "localhost";
$username = "root";
$password = "Siddhant@0867";
$database = "social_app"; 


$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "not connected".mysqli_connect_error();
}
else{
// echo "Connected successfully";
}
?>