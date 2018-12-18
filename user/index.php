<?php $title="DASHBOARD"; 
include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
date_default_timezone_set('Asia/Manila');
/*total for medicine*/
$sql = "SELECT * FROM inventory";
$result = $connect->query($sql);
$rowcount = $result->num_rows;
/*total for supplier*/
$sql1 = "SELECT * FROM suppliers";
$result1 = $connect->query($sql1);
$rowcount1 = $result1->num_rows;
$date3 =  date('Y-m-d', time());
$sql2 ="SELECT * FROM inventory WHERE expiration <= '$date3'";
$result2 = $connect->query($sql2);
$rowcount2 = $result2->num_rows;
$total_sales = 0;
 $sales = "SELECT total_payment FROM payment";
 $result = $connect->query($sales);
 while($row = $result->fetch_array()){
 	$total_sales = $total_sales + $row['total_payment'];
 }
echo"
<div id='dashboard'>
<div class='column1'>
<img src='../image/cart.png'>
<div>
	<label>Sales: $total_sales</label>
</div>
</div>
<div class='column1'>
<img src='../image/product.png'>
<div>
	<label>Medicines: $rowcount </label>
</div>
</div>
<div class='column1'>
<img src='../image/sales.png'>
<div>
	<label>Sales Reports</label>
</div>
</div>
<div class='column1'>
<img src='../image/delete1.png'>
<div>
	<label>Expired Medicines: $rowcount2 </label>
</div>
</div>
<div class='column1'>
<img src='../image/user.png'>
<div>
	<label>Suppliers: $rowcount1</label>
</div>
</div>
</div>
<div class='column2'>
<div>
<label>R&S PHARMACY</label>
</div>
<div>
<p><span class='fa fa-calendar' aria-hidden='true'></span> ".date('l').',&nbsp'.date('m-d-Y')." </p>
</div>
<div>
<p><span class='fa fa-clock-o' aria-hidden='true'></span> <span id='clock'></span> </p>
</div>
</div>
";
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>