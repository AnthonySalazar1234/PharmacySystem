<?php $title="ADMIN"; include"side_nav.php"; 
require"../php/connect.php";
if(isset($_POST['edit'])){

	$brand_name = $_POST['brand_name'];
	$generic_name = $_POST['generic_name'];
	$category = $_POST['category'];
	$type = $_POST['type'];
	$dosage = $_POST['dosage'];
	$manufactured = $_POST['manufactured'];
	$expiration = $_POST['expiration'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];

	date_default_timezone_get('Asia/Manila');
	$date1 = time();
	$date2 = date('Y-m-d',$date1);
	if($expiration<=$date2){
		echo"<script>alert('Unable to Update Expired Medicine');window.location.href=('admin_products.php');</script>";
	}
	else{
	$update = "UPDATE inventory SET brand_name = '$brand_name',generic_name = '$generic_name',category='$category',type='$type',dosage='$dosage',manufactured='$manufactured',expiration='$expiration',quantity='$quantity',price='$price' WHERE product_id ='$product_id'";
	if($result = $connect->query($update)==TRUE){
		echo"<script>alert('Medicine Updated');window.location.href=('admin_products.php');</script>";
	}
	else{
		echo"Error";
	}
}
}
$fetch = "SELECT * FROM inventory WHERE product_id = '$product_id'";
$result1 = $connect->query($fetch);
if($result1->num_rows){
while($row = $result1->fetch_array()){
echo"
<form method='POST'>
<div id='edit_med'>
<div class='edit_header'>
<label>Edit Information</label>
</div>
<div class='edit_info'>
<div>
<label>Brand Name:</label>
</div>
<div>
<input type='text' name='brand_name' value='$row[brand_name]' required=''>
</div>
<div>
<label>Generic Name: </label>
</div>
<div>
<input type='text' name='generic_name' value='$row[generic_name]' required=''>
</div>
<div>
<label>Category:</label>
</div>
<div>
<select required='' name='category'>
	<option style='background-color: skyblue;' selected='selected'>$row[category]</option>
	<option value='Liquid'>Liquid</option>
	<option value='Tablet'>Tablet</option>
</select>
</div>
<br>
<div>
	<button type='submit' name='edit'>Save</button>
</div>
</div>
<div class='edit_info'>
<div>
<label>Type:</label>
</div>
<div>
<input type='text' name='type' value='$row[type]' required=''>
</div>
<div>
<label>Dosage</label>
</div>
<div>
<input type='text' name='dosage' value='$row[dosage]' required=''>
</div>
<div>
<label>Manufactured Date</label>
</div>
<div>
<input type='date' name='manufactured'  value='$row[manufactured]' required=''>
</div>
</div>
<div class='edit_info'>
<div>
<label>Expiration Date:</label>
</div>
<div>
<input type='date' name='expiration' value='$row[expiration]' required=''>
</div>
<div>
<label>Quantity</label>
</div>
<div>
<input type='number' name='quantity' value='$row[quantity]' required=''>
</div>
<div>
<label>Price</label>
</div>
<div>
<input type='number' name='price' value='$row[price]' required=''>
</div>
</div>
</div>
</form>
";
}}
else if(empty($product_id)){
	echo"<div class='message'>
		<label>Error to Edit Data</label>
	</div>";
}
else{
	echo"Error";
}
?>