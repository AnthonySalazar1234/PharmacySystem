 <?php include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
 require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');?>
 <div class='print'>
<div>
<a href="admin_sales.php"><button><span class='fa fa-arrow-left' aria-hidden='true'></span> Back</button></a>
</div>
<div>
<button onclick="printContent('receipt_box')"><span class='fa fa-print' aria-hidden='true' style="font-size: 20pt;"></span> Print Receipt</button>
</div>
</div>
<?php
$RS = $_GET['RS'];
$sql = "SELECT * FROM payment WHERE RS = '$RS'";
$result = $connect->query($sql);
$res = $result->fetch_assoc();
echo "
      <div id='receipt_box'>
      <div class ='receipt_header'>
      <label>R&S PHARMACY</label>
      <b><p>Calumpang Molo, Iloilo City, 5000</p>
      <p>Official Receipt</p></b>
      <p>Date: $res[date_paid]</p>
      <p>Time: $res[time]</p>
      </div>";
    $message ='';
    $sql1 = "SELECT * FROM purchased_item WHERE RS = '$RS'";
    $result1 = $connect->query($sql1);
    if($result1->num_rows){
      echo "
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
      <p>Purchased Item (s): $res[total_items]</p>
      <p>Discount: $res[discount]%</p>
      <p>Vat: $res[vat]</p>
      <p>Amount Due: ₱ $res[total_payment]</p>
      <p>Amount Paid: ₱ $res[paid]</p>
      <p>Change: ₱ $res[total_change]</p>  
    <h3>--------------------------------------------------</h3>
      <center><p>Pharmacist: $_SESSION[firstname] $_SESSION[lastname]</p></center>
    <h3>--------------------------------------------------</h3>
     <strong><div>
      <p>Sold to:</p>
      </div>
      <div>
      <p>Address:</p>
      </div>
      <div>
      <p>Tin:</p>
      </div></strong>
    <h3>--------------------------------------------------</h3>
        <center>
        <p>Only defective and/or damaged items will be accepted for return or exchange and
        subject to DTI rules on return/exchange.Bring this receipt to return or exchange within seven(7) days from purchase date.</p></center>
</div>
</div>
</div>";
?>
 <script src="../js/receipt.js"></script>
 <?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>
