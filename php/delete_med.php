<?php require"connect.php"; 
$sql="DELETE FROM inventory WHERE product_id = '$product_id'";
if($connect->query($sql)==TRUE){
	header("Location:/user/products.php");
}
else{
	echo"Error";
} 
?>