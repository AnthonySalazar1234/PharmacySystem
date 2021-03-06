<?php $title="ADMIN"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
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
		echo"<script>alert('Unable to Update Expired Medicine');window.location.href=('admin_edit_med.php?product_id=$product_id');</script>";
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
<label><span class='fa fa-edit' aria-hidden='true'></span> Edit Information</label>
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
	<select required name='category'>
           <option selected='selected'>$row[category]</option>
            <option>-----------------------</option>
            <option value='Tablet'>Tablet</option>
            <option value='Capsule'>Capsule</option>
            <option value='Syrup'>Syrup<'option>
            <option value='Softgel Capsule'>Softgel Capsule</option>
            <option value='Caplet'>Caplet</option>
            <option>-----------------------</option>
          </select>
</div>
<div>
	<button type='submit' name='edit'><span class='fa fa-save' aria-hidden='true'></span> Save</button>
</div>
</div>
<div class='edit_info'>
<div>
<label>Type:</label>
</div>
<div>
 <select required name='type'>
            <option selected='selected'>$row[type]</option>
            <option>---------------------</option>
            <option value='Cough & Colds'>Cough & Colds</option>
            <option value='Body & Muscle Pain'>Body & Muscle Pain</option>
            <option value='Headache,Fever & Flu'>Headache,Fever & Flu</option>
            <option value='Allergy'>Allergy</option>
            <option value='Vitamins'>Vitamins</option>
            <option value='Healthy Aging Seniors'>Healthy Aging Seniors</option>
             <option>--------------------</option>
          </select>
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
	header("refresh:1 admin_products.php");
	echo"<div class='message'>
		<label>Error to Edit Data</label>
	</div>";
}
else{
	echo"Error";
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>