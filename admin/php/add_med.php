<?php
 require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
 if(isset($_POST['add'])){ 
$brand_name = $_POST['brand_name'];
$generic_name = $_POST['generic_name'];
$category = $_POST['category'];
$type = $_POST['type'];
$dosage = $_POST['dosage'];
$manufactured = $_POST['manufactured'];
$expiration = $_POST['expiration'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$manufacturer = $_POST['manufacturer'];
$date = date("m/d/Y");
$product_id = date('mdyis');

$select = "SELECT brand_name,generic_name FROM inventory WHERE brand_name = '$brand_name' AND generic_name = '$generic_name'";
$select1 = "SELECT brand_name FROM inventory WHERE brand_name = '$brand_name'";
$result=$connect->query($select);
$result1=$connect->query($select1);
$count =  $result->num_rows;
$count1 =  $result1->num_rows;
date_default_timezone_get('Asia/Manila');
$date1=time();
$date2 = date('Y-m-d',$date1);
if($count !=0){
	echo "<script>alert('Sorry You Have Enter Existing Medicine');window.location.href=('/admin/admin_products.php');</script>";
}
else if($count1 !=0){
	echo "<script>alert('Sorry You Have Enter Existing Medicine');window.location.href=('/admin/admin_products.php');</script>";
}
//else if($expiration<=$manufactured){
else if($expiration<=$date2){
	echo"<script>alert('Unable to process you have enter expired medicine');window.location.href=('/admin/admin_products.php');</script>";
}
else{
$insert = $connect->prepare("INSERT INTO inventory(product_id,brand_name,generic_name,category,type,dosage,manufactured,expiration,price,quantity,manufacturer,date)VALUES('$product_id','$brand_name','$generic_name','$category','$type','$dosage','$manufactured','$expiration','$price','$quantity','$manufacturer','$date')");
$insert->execute();
if($insert==TRUE){
	echo "<script>alert('Successfull New Medicine Added');window.location.href=('/admin/admin_products.php');</script>";
}
else{
	echo"Error Add Medicine";
}
}
}

?>
