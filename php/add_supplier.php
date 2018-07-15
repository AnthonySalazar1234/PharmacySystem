<?php 
require"connect.php";
if(isset($_POST['add']))
{
	$supplier_name = $_POST['supplier_name'];
	$contact_person = $_POST['contact_person'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$note = $_POST['note'];
	$date = date("m/d/Y");

$select = "SELECT supplier_name FROM suppliers WHERE supplier_name = '$supplier_name'";
$result = $connect->query($select);
$count =  $result->num_rows;
if($count !=0){
	echo "<script>alert('Sorry You Have Enter Existing Supplier');window.location.href=('../user/supplier.php');</script>";
}
else{
	$sql = $connect->prepare("INSERT INTO suppliers(supplier_name,contact_person,address,contact,email,note,date)VALUES('$supplier_name','$contact_person','$address','$contact','$email','$note','$date')");
	$sql->execute();
		echo"<script>alert('New Supplier Added');window.location.href=('../user/supplier.php');</script>";
	}	
}
else{
	echo"Error";
}
$connect->close();
?>