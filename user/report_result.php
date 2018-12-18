<?php $title="REPORTS RESULTS";
 include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
 require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php'); 

	$message='';
	$history = $_POST['history'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	if(empty($start_date&&$end_date)){
		header("Location:report.php");
	}
?>
<div id="table_header">
<button onclick="printContent('table_box');"><span class='fa fa-print' aria-hidden='true'></span> Print Report</button>
</div>
<div id="table_box" class="table_box">
<table>
	<tr class="trheader">
<?php 
$total=0;
if($history == 'purchased_item'){
	$purchased = "SELECT * FROM purchased_item WHERE date_purchased BETWEEN '$start_date' AND '$end_date' ORDER BY date_purchased";
	$result1 = $connect->query($purchased);
	$rowcount = $result1->num_rows;
echo
	"<tr>
		<th>From: $start_date</th>
		<th>To: $end_date</th>
		<th>Sold Product: $rowcount</th>
	</tr>";
}
else if($history == 'payments'){
$payments = "SELECT * FROM payment WHERE date_paid BETWEEN '$start_date' AND '$end_date' ORDER BY date_paid";
	$result2 = $connect->query($payments);
	while($row = $result2->fetch_array()){
	$total = $row['total_payment']+$total;
}
echo
	"<tr>
		<th>From: $start_date</th>
		<th>To: $end_date</th>
		<th>Profit: $total</th>
	</tr>";
}
	if($history == 'purchased_item'){
	$sql = "SELECT * FROM purchased_item WHERE date_purchased BETWEEN '$start_date' AND '$end_date' ORDER BY date_purchased";
	$result = $connect->query($sql);
	if($result->num_rows>0){
	echo"
			<tr class='resultslabel'>
			<th>OR #</th>
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
		<td>$row[RS]</td>
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
		echo"<script>alert('No Results Found');window.location.href=('report.php');</script>";
		//$message = 'No Results';
	}
}
else if($history == 'payments'){
$sql1 = "SELECT * FROM payment WHERE date_paid BETWEEN '$start_date' AND '$end_date' ORDER BY date_paid";
	$result01 = $connect->query($sql1);
	if($result01->num_rows>0){
	echo"<tr class='resultslabel'>
			<th>RS Number</th>
			<th>Total Quantity</th>
			<th>Total Items</th>
			<th>Discount</th>
			<th>Vat</th>
			<th>Amount Due</th>
			<th>Amount Paid</th>
			<th>Total Change</th>
		</tr>";
	while($row = $result01->fetch_array()){
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
		echo"<script>alert('No Results Found');window.location.href=('report.php');</script>";
		//$message = 'No Results';
	}
}
?>
</table>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>