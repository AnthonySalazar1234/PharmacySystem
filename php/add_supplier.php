<?php 
require"connect.php";
if(isset($_POST['add']))
{
	$supplier_name = mysqli_real_escape_string($connect,$_POST['supplier_name']);
	$contact_person = mysqli_real_escape_string($connect,$_POST['contact_person']);
	$address = mysqli_real_escape_string($connect,$_POST['address']);
	$contact = mysqli_real_escape_string($connect,$_POST['contact']);
	$note = mysqli_real_escape_string($connect,$_POST['note']);
	$date = date("m/d/Y");

$select = "SELECT supplier_name FROM suppliers WHERE supplier_name = '$supplier_name'";
$result = $connect->query($select);
$count =  $result->num_rows;
if($count !=0){
	echo "<script>alert('Sorry You Have Enter Existing Supplier');window.location.href=('/user/supplier.php');</script>";
}
else{
	$supplier = $connect->prepare("INSERT INTO suppliers(supplier_name,contact_person,address,contact,note,date)VALUES('$supplier_name','$contact_person','$address','$contact','$note','$date')");
	$supplier->execute();
		echo"<script>alert('New Supplier Added');window.location.href=('/user/supplier.php');</script>";
	}	
}
$connect->close();
?>