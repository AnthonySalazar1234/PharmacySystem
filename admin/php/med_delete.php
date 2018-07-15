<?php require"../../php/connect.php"; 
$product_id = (isset($_GET['product_id']) ? $_GET['product_id']:"");
$del_med="DELETE FROM inventory WHERE product_id = '$product_id'";
if($result = $connect->query($del_med)){
	header("Location:../../admin/admin_products.php");
}
else{
	echo"Error";
} 
?>