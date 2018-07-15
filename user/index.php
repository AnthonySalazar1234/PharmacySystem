<?php $title="DASHBOARD"; include"side_nav.php"; 
require'../php/connect.php';
/*total for medicine*/
$sql = "SELECT * FROM inventory";
if($result = $connect->query($sql)){
$rowcount = $result->num_rows;
}
/*total for supplier*/
$sql1 = "SELECT * FROM suppliers";
if($result1 = $connect->query($sql1)){
	$rowcount1 = $result1->num_rows;
}
$date3 =  date('Y-m-d', time());
$sql2 ="SELECT * FROM inventory WHERE expiration <= '$date3'";
if($result2 = $connect->query($sql2)){
$rowcount2 = $result2->num_rows;
}
$date = date('l').',&nbsp'.date('m-d-Y');
echo"
<div id='dashboard'>
<div class='column1'>
<img src='../image/cart.png'>
<div>
	<label>Sales</label>
</div>
</div>
<div class='column1'>
<img src='../image/product.png'>
<div>
	<label>Medicines:  $rowcount </label>
</div>
</div>
<div class='column1'>
<img src='../image/report1.png'>
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
<p><img src='../image/calendar.jpg' > $date </p>
</div>
<div>
<p><img src='../image/clock.jpg'> <span id='clock'></span> </p>
</div>
</div>
";
?>