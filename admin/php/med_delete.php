<?php  require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
$product_id = $_GET['product_id'];
$del_med="DELETE FROM inventory WHERE product_id = '$product_id'";
if($connect->query($del_med)){
	header("Location:/admin/admin_products.php");
}
else{
	echo"Error";
} 
  ?>