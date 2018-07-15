<?php $title="ADMIN DASHBOARD"; include"side_nav.php"; 
require'../php/connect.php';
/*total for medicine*/
$sql = "SELECT * FROM inventory";
if($result = mysqli_query($connect,$sql)){
$rowcount = mysqli_num_rows($result);
}
/*total for supplier*/
$sql1 = "SELECT * FROM suppliers";
if($result1 = mysqli_query($connect,$sql1)){
	$rowcount1 = mysqli_num_rows($result1);
}
$date3 =  date('Y-m-d', time());
$sql2 ="SELECT * FROM inventory WHERE expiration <= '$date3'";
if($result2 = mysqli_query($connect,$sql2)){
$rowcount2 = mysqli_num_rows($result2);
}
$sql3 = "SELECT * FROM user";
if($result3 = mysqli_query($connect,$sql3)){
	$rowcount3 = mysqli_num_rows($result3);
}
$date = date('l').',&nbsp'.date('m-d-Y');
echo"
<div id='dashboard'>
<div class='column1'>
<img src='../image/user.png'>
<div>
	<label>Users <?php $rowcount3</label>
</div>
</div>
<div class='column1'>
<img src='../image/product.png'>
<div>
	<label>Medicines: $rowcount</label>
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
	<label>Expired Medicines: $rowcount2</label>
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
<p><img src='../image/calendar.jpg'> $date </p>
</div>
<div>
<p><img src='../image/clock.jpg'> <span id='clock'></span> </p>
</div>
</div>";
?>