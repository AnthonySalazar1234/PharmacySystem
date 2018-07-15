<?php
require"connect.php";
extract($_GET);
$sql = "SELECT * FROM inventory WHERE product_id='$product_id'";
$result = $connect->query($sql);
$res = $result->fetch_assoc();
 $quantity = $res['quantity'];
$total = $quantity + $qty;
$sql1= "UPDATE inventory SET quantity = '$total' WHERE product_id='$product_id'";
$connect->query($sql1);
$sql2 = "DELETE  FROM sold WHERE product_id='$product_id'";
$connect->query($sql2);
header("location:../user/pos.php");
?>