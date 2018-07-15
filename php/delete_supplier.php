<?php require"connect.php"; 
$id = $_GET['id'];
$sql="DELETE FROM suppliers WHERE id = '$id'";
if($connect->query($sql)==TRUE){
	echo"<script>alert('Info Deleted');window.location.href=('../user/supplier.php');</script>";
}
else{
	echo"Error";
}
$connect->close();
?>