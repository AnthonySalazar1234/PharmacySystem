<!DOCTYPE html>
<html>
<head>
  <title>R&S PHARMACY PRINT RECEIPT</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" type="text/css" href="../css/receipt_design2.css">
  <script src="../js/receipt.js"></script>
</head>
<body>
<div id="header">
<a href="admin_sales.php"><button class="back">Back</button></a>
<button class="onprint" onclick="printContent('receipt_box')">Print Receipt</button>
</div>
<div id="receipt_box1">
<div class="receipt_header">
  <label>R&S PHARMACY</label>
  <p>Calumpang Molo, Iloilo City, 5000</p>
  <p>Official Receipt</p>
  <p>Date: <?php 
require"../php/connect.php";
$RS = $_GET['RS'];
$sql1 = "SELECT * FROM payment WHERE RS = '$RS'";
$result = $connect->query($sql1);
$res = $result->fetch_assoc();
echo $res['date_paid'];	
  ?></p>
</div>
<div class="or">
<p>
OR #: RS-<?php 
$RS = (isset($_GET['RS'])?$_GET['RS']:"");
echo $RS;
?></p>
</div>
 <div class="underline">
 <h3>---------------------------------------------------------</h3>
  </div>
<div class="receipt_body">
<table>
  <tr>
    <th>Medicine</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>
  <?php
    $message ='';
    $sql = "SELECT * FROM purchased_item WHERE RS = '$RS'";
    $result1 = $connect->query($sql);
    if($result1->num_rows){
    while($row = $result1->fetch_array()){
      echo"<tr class='td'>
          <th>".$row['brand_name']."</th>
          <th>".$row['qty']."</th>
          <th>".$row['price']."</th>";
}}
else{
  $message = "EMPTY DATA";
}
  ?>
</table>
<div class="underline">
  <h3>---------------------------------------------------------</h3>
  </div>
<div class="total_list">
<?php 
echo "<p>Purchased Item: ".$res['total_items']."</p>
      <p>Discount: ".$res['discount']."%</p>
      <p>Vat: ".$res['vat']."</p>
      <p>Amount Due: ₱".$res['total_payment']."</p>
      <p>Amount Paid: ₱".$res['paid']."</p>
      <p>Change: ₱".$res['total_change']."</p>  
      ";
?>
</div>
</div>
</div>


