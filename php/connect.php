<?php
//$connect = mysqli_connect("localhost","root","","pos");
//if(!$connect){
//	die("Error Connect" .mysqli_connect_error());
//}
$servername = "localhost";
$username = "root";
$password = "";
$connect = "pos";

$connect = new mysqli($servername, $username, $password, $connect);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
 ?>