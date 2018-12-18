<?php $title="SALES"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
if(isset($_POST['search'])){
$brand_name = $_POST['brand_name'];
$sql = "SELECT * FROM purchased_item WHERE brand_name LIKE '%$brand_name' ORDER BY date_purchased DESC";
$result = $connect->query($sql);
}
else{
$sql = "SELECT * FROM purchased_item ORDER BY date_purchased DESC";
$result = $connect->query($sql);
}
$total = 0;
$sql = "SELECT * FROM purchased_item";
$result1 = $connect->query($sql);
$rowcount1 =  $result1->num_rows;
while($row = $result1->fetch_array()){
   $total = $row['subtotal']+$total;
}
date_default_timezone_set('Asia/Manila');
$date = date('m');
if($date == '01'){
  $dated = 'January';
}
if($date == '02'){
  $dated = 'February';
}
if($date == '03'){
  $dated = 'March';
}
if($date == '04'){
  $dated = 'April';
}
if($date == '05'){
  $dated = 'May';
}
if($date == '06'){
  $dated = 'June';
}
if($date == '07'){
  $dated = 'July';
}
if($date == '08'){
  $dated = 'August';
}
if($date == '09'){
  $dated = 'September';
}
if($date == '10'){
  $dated = 'October';
}
if($date == '11'){
  $dated = 'November';
}
if($date == '12'){
  $dated = 'December';
}
?>
<div id='table_header'>
<!--<button type='submit' id='myBtn'>Add Member +</button>
<button>Total Amount:</button>-->
<button onclick = "printContent('table_box')"><span class='fa fa-print'></span> Print Sales</button>
 <a href=''><button><span class='fa fa-users' aria-hidden='true'></span> Customer Payments</button></a>
   <div class='search'>
    <form method='POST' autocomplete="off">
      <input type='text' placeholder='Search Medicine...' name='brand_name'>
      <button type='submit' name='search'><span class='fa fa-search' aria-hidden='true'></span></button>
    </form>
</div>
</div>
<?php
echo"
<div class='table_box' id='table_box'>
<table>
";
if($result->num_rows){
  echo"
    <tr>
     <th>Sales Profit: $total</th>
    </tr>
    <tr>
    <th>Sold Product: $rowcount1</th>
    </tr>
    <tr>
    <th>Brand Name</th>
    <th>Generic Name</th>
    <th>Expiration</th>
    <th>Category/Dosage</th>
    <th>Transaction Date</th>
    <!--<th>View Transactions</th>-->
    </tr>";
  while($row = $result->fetch_array()){
    echo"
      <tr>
      <td>$row[brand_name]</td>
      <td>$row[generic_name]</td>
      <td>$row[expiration]</td>
      <td>$row[category] / $row[dosage]</td>
      <td>$row[date_purchased]</td>
      <!--<td><a href='admin_view_transaction.php?RS=$row[RS]'>View <span class='fa fa-eye' aria-hidden='true'></span></a></td>-->
      </tr>";
  }
}
else if(!empty($_POST['brand_name'])){
  echo "<script>alert('Empty Result');window.location.href=('admin_sales.php');</script>";
}
else{
  echo 
  "<div class='message'>
  Empty Results
  </div>";

}
?>
</table>  
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>
<!--modal for fill up form
<form method="POST" enctype="multipart/form-data" action="../php/frontrow_reg.php">
      <div id="myModal" class="modal">
  <div class="modal-content1">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Fill Up Info</h2>
    </div>
    <div class="modal-body">
     </div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>-->

