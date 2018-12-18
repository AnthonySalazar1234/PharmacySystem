<?php
 require"connect.php";
 if(isset($_POST['add'])){ 
$brand_name = mysqli_real_escape_string($connect,$_POST['brand_name']);
$generic_name = mysqli_real_escape_string($connect,$_POST['generic_name']);
$category = mysqli_real_escape_string($connect,$_POST['category']);
$type = mysqli_real_escape_string($connect,$_POST['type']);
$dosage = mysqli_real_escape_string($connect,$_POST['dosage']);
$manufactured = mysqli_real_escape_string($connect,$_POST['manufactured']) ;
$expiration = mysqli_real_escape_string($connect,$_POST['expiration']);
$quantity = mysqli_real_escape_string($connect,$_POST['quantity']);
$price = mysqli_real_escape_string($connect,$_POST['price']);
$manufacturer = mysqli_real_escape_string($connect,$_POST['manufacturer']);
$date = date("Y-m-d");
$product_id = date('mdyis');

$select = "SELECT brand_name,generic_name FROM inventory WHERE brand_name = '$brand_name' AND generic_name = '$generic_name'";
$select1 = "SELECT brand_name FROM inventory WHERE brand_name = '$brand_name'";
$result = $connect->query($select);
$result1 = $connect->query($select1);
$count =  $result->num_rows;
$count1 = $result1->num_rows;
date_default_timezone_get('Asia,Manila');
$date1 = time();
$date2  = date('Y-m-d', $date1);
if($count!=0){
	echo "<script>alert('Sorry you have existing medicine');window.location.href=('/user/products.php?id=myBtn');</script>";
}
else if($count1!=0){
	echo "<script>alert('Sorry you have existing medicine');window.location.href=('/user/products.php');</script>";
}
else if($expiration<=$date2){
	echo"<script>alert('Unable to process you have enter expired medicine');window.location.href=('/user/products.php');</script>";
}
else{
$insert = $connect->prepare("INSERT INTO inventory(product_id,brand_name,generic_name,category,type,dosage,manufactured,expiration,price,quantity,manufacturer,date)VALUES('$product_id','$brand_name','$generic_name','$category','$type','$dosage','$manufactured','$expiration','$price','$quantity','$manufacturer','$date')");
$insert->execute();
	echo "<script>alert('Successfull New Medicine Added');window.location.href=('/user/products.php');</script>";
}
}
$connect->close();
?>
