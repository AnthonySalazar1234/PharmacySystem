<?php $title="SALES REPORTS"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php'); 
	$start_date =  $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$history = $_POST['history'];
	if(empty($start_date&&$end_date)){
		header("Location:admin_report.php");
	}
?>
<div id="table_header">
<button onclick="printContent('table_box');"><span class='fa fa-print' aria-hidden='true'></span> Print Report</button>
<?php 
$total = 0;
if($history == 'payments'){
$cus_payment = "SELECT sum(total_payment) FROM payment WHERE date_paid BETWEEN '$start_date' AND '$end_date' ORDER BY date_paid";
$result = $connect->query($cus_payment);
while($row = $result->fetch_array()){
$total = $row['sum(total_payment)'];
}
}
?>
</div>
<div id="table_box" class="table_box">
<table>
<?php 
	if($history == 'purchased_item'){
	$purchased = "SELECT * FROM purchased_item WHERE date_purchased BETWEEN '$start_date' AND '$end_date' ORDER BY date_purchased";
	$result = $connect->query($purchased);
	$rowcount = $result->num_rows;
	if($result->num_rows>0){
	echo"
		<tr>
		<th>From: $start_date</th>
		<th>To:	$end_date</th>
		<th>Sold Product: $rowcount</th>
		</tr>
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
		<tr>
		<td>$row[brand_name]</td>
		<td>$row[generic_name]</td>
		<td>$row[expiration]</td>
		<td>$row[category]</td>
		<td>$row[dosage]</td>
		<td>$row[price]</td>
		<td>$row[qty]</td>
		<tr>";
	}
}
	else{
		echo"<script>alert('No Results Found');window.location.href=('admin_report.php');</script>";
	}
}
else if($history == 'payments'){
$cus_payment = "SELECT * FROM payment WHERE date_paid BETWEEN '$start_date' AND '$end_date' ORDER BY date_paid";
	$result = $connect->query($cus_payment);
	if($result->num_rows>0){
	echo"
			<tr>
			<th>From: $start_date</th>
			<th>To:	$end_date</th>
			<th>Profit: $total</th>
			</tr>
			<tr class='resultslabel'>
			<th>RS Number</th>
			<th>Total Quantity</th>
			<th>Total Items</th>
			<th>Discount</th>
			<th>Vat</th>
			<th>Total Payment</th>
			<th>Paid</th>
			<th>Total Change</th>
		</tr>";
	while($row = $result->fetch_array()){
	echo"
		<tr>
		<td>$row[RS]</td>
		<td>$row[total_qty]</td>
		<td>$row[total_items]</td>
		<td>$row[discount]</td>
		<td>$row[vat]</td>
		<td>$row[total_payment]</td>
		<td>$row[paid]</td>
		<td>$row[total_change]</td>
		<tr>";
	}
}
	else{
		echo"<script>alert('No Results Found');window.location.href=('admin_report.php');</script>";
	}
}
?>
</table>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>