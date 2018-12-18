<?php require"connect.php"; 
$sql="DELETE FROM suppliers WHERE id = '$id'";
if($connect->query($sql)==TRUE){
		header("Location:/user/supplier.php");
}
else{
	echo"Error";
}
$connect->close();
?>