<?php $title="SALES REPORTS"; include"side_nav.php"; require"../php/connect.php"; 
	$message='';
	$start_date =  $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$history = (isset($_POST['history'])?$_POST['history']:"");
?>
<div id="table_header">
<button type="submit" name="print" onclick='PrintDiv();'>Print</button>
<?php 
$total=0;
if($history == 'purchased_item'){
	$purchased = "SELECT * FROM purchased_item WHERE date_purchased BETWEEN '$start_date' AND '$end_date' ORDER BY date_purchased";
	$result = $connect->query($purchased);
	$rowcount = $result->num_rows;
	while($row = $result->fetch_array()){
	$total = $row['qty']+$total;
}
echo"<button>Total Quantity Sold: $total</button>";
echo "<button>Total Product Sold: $rowcount</button>";
}
else if($history == 'payments'){
$cus_payment = "SELECT * FROM payment WHERE date_paid BETWEEN '$start_date' AND '$end_date' ORDER BY date_paid";
	$result1 = $connect->query($cus_payment);
	while($row = $result1->fetch_array()){
$total = $row['total_payment']+$total;
}
echo "<button>Total Profit: $total</button>";
}
?>
</div>
<div id="table_box" class="table_box">
<table>
	<tr class="trheader">
		<th>From: <?php echo $start_date ?></th>
		<th>To: <?php echo $end_date ?></th>
	</tr>
<?php 
	if($history == 'purchased_item'){
	$purchased = "SELECT * FROM purchased_item WHERE date_purchased BETWEEN '$start_date' AND '$end_date' ORDER BY date_purchased";
	$result = $connect->query($purchased);
	if($result->num_rows>0){
	echo"
			<tr class='resultslabel'>
			<th>Brand Name</th>
			<th>Generic Name</th>
			<th>Expiration</th>
			<th>Category</th>
			<th>Dosage</th>
			<th>Price</th>
			<th>Quantity Sold</th>
		</tr>";
	while($row = $result->fetch_array()){
	echo"
		<tr  class='resultsrow' style='background-color:#fff;'>
		<td>".$row['brand_name']."</td>
		<td>".$row['generic_name']."</td>
		<td>".$row['expiration']."</td>
		<td>".$row['category']."</td>
		<td>".$row['dosage']."</td>
		<td>".$row['price']."</td>
		<td>".$row['qty']."</td>
		<tr>";
	}
}
	else{
		echo"<script>alert('No Results Found');window.location.href=('admin_report.php');</script>";
		//$message = 'No Results';
	}
}
else if($history == 'payments'){
$cus_payment = "SELECT * FROM payment WHERE date_paid BETWEEN '$start_date' AND '$end_date' ORDER BY date_paid";
	$result1 = $connect->query($cus_payment);
	if($result1->num_rows>0){
	echo"<tr class='resultslabel'>
			<th>RS Number</th>
			<th>Total Quantity</th>
			<th>Total Items</th>
			<th>Discount</th>
			<th>Vat</th>
			<th>Total Payment</th>
			<th>Paid</th>
			<th>Total Change</th>
		</tr>";
	while($row = $result1->fetch_array()){
	echo"
		<tr class='resultsrow' style='background-color:#fff;'>
		<td>".$row['RS']."</td>
		<td>".$row['total_qty']."</td>
		<td>".$row['total_items']."</td>
		<td>".$row['discount']."</td>
		<td>".$row['vat']."</td>
		<td>".$row['total_payment']."</td>
		<td>".$row['paid']."</td>
		<td>".$row['total_change']."</td>
		<tr>";
	}
}
	else{
		echo"<script>alert('No Results Found');window.location.href=('admin_report.php');</script>";
		//$message = 'No Results';
	}
}
?>
</table>
</div>