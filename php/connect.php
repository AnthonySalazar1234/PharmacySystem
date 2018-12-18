<?php
$connect = new mysqli("localhost","root","","pos");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
extract($_GET);
 ?>
