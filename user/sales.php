<?php $title="SALES"; 
include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');?>
<div id='table_header'>
<button onclick="printContent('sales_box');"><span class='fa fa-print' aria-hidden='true' style="font-size: 14pt"></span> Print Content</button>
<?php 
if(isset($_POST['search'])){
$brand_name = $_POST['brand_name'];
$sql = "SELECT * FROM purchased_item WHERE brand_name LIKE '%$brand_name' ORDER BY date_purchased DESC";
$result = $connect->query($sql);
}
else{
$sql = "SELECT * FROM purchased_item ORDER BY date_purchased DESC";
$result = $connect->query($sql);
}
$sql = "SELECT subtotal FROM purchased_item";
$result1 = $connect->query($sql);
$rowcount = $result1->num_rows;
while($row = $result1->fetch_array()){
  $total = $row['subtotal']+$total;
}
  echo"
  <button>No. of Product(s) Sold: $rowcount</button>
  <button>Total Profit: $total</button>
  <button id='myBtn'><span class='fa fa-users' aria-hidden='true'></span> Customer Payments</button>
  <div class='search'>
    <form method='POST'>
      <input type='text' placeholder='Search Medicine...' name='brand_name'>
      <button type='submit' name='search'> <span class='fa fa-search' aria-hidden='true'></span></button>
    </form>
</div>
</div>
";?>
<div id="sales_box" class="table_box">
<table>
  <?php
if($result->num_rows){
  echo"
    <tr>
    <th>Brand Name</th>
    <th>Generic Name</th>
    <th>Expiration</th>
    <th>Category/Dosage</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Subtotal</th>
    <th>Transaction Date</th>
    </tr>";
    while($row = $result->fetch_array()){
    echo"
      <tr>
      <td>$row[brand_name]</td>
      <td>$row[generic_name]</td>
      <td>$row[expiration]</td>
      <td>$row[category]&nbsp/&nbsp$row[dosage]</td>
      <td>$row[qty]</td>
      <td>$row[price]</td>
      <td>$row[subtotal]</td>
      <td>$row[date_purchased]</td>
      </tr>";
  }
}
else if(!empty($_POST['brand_name'])){
  echo"<script>alert('No Results');window.location.href=('sales.php');</script>";
}
else{
  echo"<div class='message'>
      Empty Results
  </div>";
}
?>
</table>
</div>
<!---modal for fill up form-->
<form method="POST" enctype="multipart/form-data" action="">
      <div id="myModal" class="modal">
  <div class="modal-content4">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2><span class='fa fa-users'></span> Customer Payments</h2>
    </div>
    <div class="modal-body">
    <div class="payment_box">
      <table>
        <tr>
          <th>RS</th>
          <th>Total Qty</th>
          <th>Total Items</th>
          <th>Discount</th>
          <th>Total Payment</th>
          <th>Paid</th>
          <th>Change</th>
          <th>Date Paid</th>
          <th>Time</th>
        </tr>
          <?php 
          $payment = "SELECT * FROM payment ORDER BY date_paid DESC";
          $result = $connect->query($payment);
          while($row = $result->fetch_array()){
            echo
            "<tr>
            <td>$row[RS]</td>
            <td>$row[total_qty]</td>
            <td>$row[total_items]</td>
            <td>$row[discount]</td>
            <td>$row[total_payment]</td>
            <td>$row[paid]</td>
            <td>$row[total_change]</td>
            <td>$row[date_paid]</td>
            <td>$row[time]</td>
            </tr>";
          }
          ?>
      </table>
    </div>
     </div>
</div>
 </div>
</form>
<script src="/js/modal_form.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>

