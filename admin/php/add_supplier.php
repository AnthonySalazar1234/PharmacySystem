<?php 
require"../../php/connect.php";
if(isset($_POST['add']))
{
	$supplier_name = $_POST['supplier_name'];
	$contact_person = $_POST['contact_person'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$note = $_POST['note'];
	$date = date("m/d/Y");

	$sql = "SELECT * FROM suppliers WHERE supplier_name = '$supplier_name' OR contact_person = '$contact_person'";
	$result = $connect->query($sql);
	$count1 = $result->num_rows;
	if($count1 !=0){
		echo "<script>alert('Supplier Name or Contact Person Existing');window.location.href=('../../admin/admin_supplier.php');</script>";
	}
	else{
	$insert = $connect->prepare("INSERT INTO suppliers(supplier_name,contact_person,address,contact,email,note,date)VALUES('$supplier_name','$contact_person','$address','$contact','$email','$note','$date')");
	$insert->execute();
	if($insert==TRUE){
		echo"<script>alert('New Supplier Added');window.location.href=('../../admin/admin_supplier.php');</script>";
	}
	else{
		echo"Error";
	}
}
}
?>