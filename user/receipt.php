<?php
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
extract($_GET);
session_start(); 
  $del = $connect->prepare("DELETE FROM sold");
  $del->execute();
  header('refresh:1 url=pos.php');
if(empty($_SESSION['firstname'])){
  header("Location: /R&S/index.php");
} 
else if(empty($id&&$RS)){
  header("Location:pos.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>R&S PHARMACY PRINT RECEIPT</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" type="text/css" href="../css/receipt_des5.css">
</head>
<body onload="window.print()">
</form>
<?php 
$payments = "SELECT * FROM payment WHERE RS = '$RS'";
$result = $connect->query($payments);
$res = $result->fetch_assoc();
date_default_timezone_set('Asia/Manila');
 $message ='';
    $sql = "SELECT * FROM purchased_item WHERE RS = '$RS'";
    $result1 = $connect->query($sql);
    if($result1->num_rows){
echo "
      <div id='receipt_box'>
      <div class ='receipt_header'>
      <label>R&S PHARMACY</label>
      <p>Calumpang Molo, Iloilo City, 5000</p>
      <p>Official Receipt</p>
      <p>Contact #: 022-1233-4131</p>
      <p>Date: ".date('m/d/Y')."</p>
      <p>Time: ".$res['time']."</p>
      </div>
    <div class='or'>
    <p>OR #: RS-$RS</p>
    <p>Counter: 0001</p>
    </div>
    <h3>---------------------------------------------------------</h3>
    <div class='receipt_body'>
    <div class='receipt_table'>
    <table>
      <tr>
    <th>Medicine</th>
    <th>Quantity</th>
    <th>Price</th>
      </tr>";
    while($row = $result1->fetch_array()){
      echo"<tr class='td'>
          <th>$row[brand_name]</th>
          <th>$row[qty]</th>
          <th>$row[price]</th>";
}}
else{
  $message = "EMPTY DATA";
}
  ?>
<?php 
echo "
  </table>
  </div>
    <h3>---------------------------------------------------------</h3>
    <div class='total_list'>
      <p>Purchased Item(s): $res[total_items]</p>
      <p>Discount: $res[discount]%</p>
      <p>Vatable Sales: $res[vat]</p>
      <p>Vat(12%): $res[total_vat]</p>
      <p>Vat Exempt Sales: 0 </p>
      <p>Amount Due: ₱ $res[total_payment]</p>
      <p>Amount Paid: ₱ $res[paid]</p>
      <p>Change: ₱ $res[total_change]</p>  
       <h3>---------------------------------------------------------</h3>
      <p>Cashier: $_SESSION[firstname] $_SESSION[lastname]</p>
    <h3>---------------------------------------------------------</h3>
      <p>Customer Name:</p>
      <p>Address:</p>
      <p>Tin #:</p>
    <!--<h3>---------------------------------------------------------</h3>
        <center>
        <p>Only defective and/or damaged items will be accepted for return or exchange and
        subject to DTI rules on return/exchange.Bring this receipt to return or exchange within seven(7) days from purchase date.</p>
        </center>-->
    <h3>---------------------------------------------------------</h3>
      <center>
      <p>This Serve as your Sales Invoice</>
      <p>Thank you and Come Again</p>
      </center>
</div>
</div>
</div>";
?>
</body>
</html>



