<?php  require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
$delete_supplier="DELETE FROM suppliers WHERE id = '$id'";
if($connect->query($delete_supplier)==TRUE){
	echo "<script>alert('Supplier Deleted');window.location.href=('/admin/admin_supplier.php');</script>";
}
else{
	echo"Error to delete supplier";
}
?>