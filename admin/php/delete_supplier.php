<?php require"../../php/connect.php"; 
$id = $_GET['id'];
$del_supplier="DELETE FROM suppliers WHERE id = '$id'";
if($result->query($del_supplier)==TRUE){
	header("Location:../../admin/admin_supplier.php");
}
else{
	echo"Error to delete supplier";
}
?>