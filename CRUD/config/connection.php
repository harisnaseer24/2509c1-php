<?php 
$server= "localhost";
$username ="root";
$password="";
$dbname="2509c1-php";


$conn = mysqli_connect($server,$username,$password,$dbname);


if (!$conn) {
    # code...
    die("connection failed".mysqli_connect_error());
} 



?>