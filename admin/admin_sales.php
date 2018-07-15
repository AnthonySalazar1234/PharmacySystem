<?php $title="SALES"; include"side_nav.php";require"../php/connect.php";
?>
<div id="table_header">
<!--<button type="submit" id="myBtn">Add Member +</button>
<button>Total Amount:</button>-->
 <?php $sql = "SELECT * FROM purchased_item";
$count = $connect->query($sql);
$rowcount = $count->num_rows;
 if(date('m')==01){
    $dated = 'January';
  }
  if(date('m')==02){
    $dated = 'February';
  }
   if(date('m')==03){
    $dated = 'March';
  }
  if(date('m')==04){
    $dated = 'April';
  }
   if(date('m')==05){
    $dated = 'May';
  }
  if(date('m')==06){
    $dated = 'June';
  }
   if(date('m')==07){
    $dated = 'July';
  }
  if(date('m')==08){
    $dated = 'August';
  }
   if(date('m')==09){
    $dated = 'September';
  }
  if(date('m')==10){
    $dated = 'October';
  }
   if(date('m')==11){
    $dated = 'November';
  }
  if(date('m')==12){
    $dated = 'December';
  }
echo"
 <button>Month of: $dated</button>
  <button>Sold Product: $rowcount</button>
   <div class='search'>
    <form method='POST'>
      <input type='text' placeholder='Search Medicine...' name='brand_name'>
      <button type='submit' name='search'>Search</button>
    </form>
</div>
</div>
";?>
<div class="table_box" id="table_box">
<table>
  <?php
if(isset($_POST['search'])){
$brand_name = $_POST['brand_name'];
$sql = "SELECT * FROM purchased_item WHERE brand_name LIKE '%$brand_name'  ORDER BY date_purchased DESC";
$result = $connect->query($sql);
}
else{
$sql = "SELECT * FROM purchased_item ORDER BY date_purchased DESC";
$result = $connect->query($sql);
}
if($result->num_rows){
  echo"<tr>
    <th>Brand Name</th>
    <th>Generic Name</th>
    <th>Expiration</th>
    <th>Category/Dosage</th>
    <th>Transaction Date</th>
    <th>View Transactions</th>
    </tr>";
  while($row = $result->fetch_array()){
    echo"
      <tr>
      <td>".$row['brand_name']."</td>
      <td>".$row['generic_name']."</td>
      <td>".$row['expiration']."</td>
      <td>".$row['category']."&nbsp/&nbsp".$row['dosage']."</td>
      <td>".$row['date_purchased']."</td>
      <td><a href='admin_view_transaction.php?RS=$row[RS]'>View</a></td>
      </tr>";
  }
}
else if(!empty($_POST['brand_name'])){
  echo "<script>alert('Empty Result');window.location.href=('admin_sales.php');</script>";
}
else{
  $message = 'No Results';
}
?>
</table>  
</div>
<!---modal for fill up form-->
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
<script src="../js/modal_form.js"></script>

