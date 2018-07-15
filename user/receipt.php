<?php
require"../php/connect.php";
extract($_GET);
if(isset($_POST['back'])){
  $del = $connect->prepare("DELETE FROM sold");
  $del->execute();
  header("Location:pos.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>R&S PHARMACY PRINT RECEIPT<?php    
  session_start(); 
if(empty($_SESSION['firstname'])){
  header("Location: ../index.php");
} 
else if(empty($id&&$RS)){
  header("Location:pos.php");
}
?></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" type="text/css" href="../css/receipt.css">
  <script src="../js/receipt.js"></script>
</head>
<body>
<div id="header">
<form method="POST">
<button type="submit" name="back" class="back">Back</button>
<button type="submit" class="onprint" onclick="printContent('receipt_box')">Print Receipt</button>
</form>
</div>
<div id="number">
  <?php 
$payments = "SELECT * FROM payment WHERE id = '$id'";
$result = $connect->query($payments);
while($row = $result->fetch_array()){
echo"
  <div>
  <input type='number' placeholder='Amount Due: ₱$row[total_payment]'  readonly>
  </div>
  <div>
  <input type='number' placeholder='Amount Paid: ₱$row[paid]' readonly>
  </div>
  <div>
  <input type='number' placeholder='Change: ₱$row[total_change]' readonly>
  </div>
    ";
}
?>
</div>
<div id="receipt_box">
<div class="receipt_header">
  <label>R&S PHARMACY</label>
  <p>Calumpang Molo, Iloilo City, 5000</p>
  <p>Official Receipt</p>
  <p>Date: <?php echo date("m/d/Y") ?></p>
</div>
<div class="or">
<p>
OR #: RS-<?php 
echo $RS;
?></p>
</div>
 <div class="underline">
 <h3>---------------------------------------------------------</h3>
  </div>
<div class="receipt_body">
<table>
  <?php
    $message ='';
    $sql = "SELECT * FROM sold";
    $result1 = $connect->query($sql);
    if($result1->num_rows==TRUE){
      echo"<tr>
          <th>Medicine</th>
          <th>Quantity</th>
          <th>Price</th>
          </tr>";
    while($row = $result1->fetch_array()){
      echo"<tr class='td'>
          <th>".$row['brand_name']."</th>
          <th>".$row['qty']."</th>
          <th>".$row['price']."</th>";
}}
else{
 echo "<div class='message'>
          UNABLE TO PRINT RECEIPT
        </div>";
}
  ?>
</table>
<div class="underline">
  <h3>---------------------------------------------------------</h3>
  </div>
<div class="total_list">
<?php 
$payments = "SELECT * FROM payment WHERE id = '$id'";
$result2 = $connect->query($payments);
while($row = $result2->fetch_array()){
echo "<p>Purchased Item: ".$row['total_items']."</p>
      <p>Discount: ".$row['discount']."%</p>
      <p>Vat: ".$row['vat']."</p>
      <p>Amount Due: ₱".$row['total_payment']."</p>
      <p>Amount Paid: ₱".$row['paid']."</p>
      <p>Change: ₱".$row['total_change']."</p>  
      ";
}
?>
</div>
</div>
</div>
</body>
</html>


