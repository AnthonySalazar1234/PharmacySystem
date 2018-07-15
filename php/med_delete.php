<?php require"connect.php"; 
extract($_GET);
//$product_id = (isset($_GET['product_id']) ? $_GET['product_id']:"");
$sql="DELETE FROM inventory WHERE product_id = '$product_id'";
if($connect->query($sql)==TRUE){
	header("Location:../user/products.php");
}
else{
	echo"Error";
} 
?>