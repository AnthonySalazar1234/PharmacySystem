<?php $title="TRANSACTIONS ".date('Y-m-d').""; 
include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
date_default_timezone_set('Asia/Manila');
$date_today = date('Y-m-d');
if(isset($_POST['search'])){
$RS = $_POST['RS'];
$sql = "SELECT * FROM payment WHERE RS LIKE '%$RS' AND date_paid = '$date_today' GROUP BY RS";
$result = $connect->query($sql);
$rowcount = $result->num_rows;
}
else{
$sql = "SELECT * FROM payment WHERE date_paid = '$date_today' GROUP BY RS";
$result = $connect->query($sql);
}
$sql = "SELECT * FROM purchased_item WHERE date_purchased LIKE '$date_today'";
$total_sold = $connect->query($sql);
$rowcount1 = $total_sold->num_rows;
$profit_total = "SELECT sum(total_payment) FROM payment WHERE date_paid = '$date_today'";
$profit_payment = $connect->query($profit_total);
while($row = $profit_payment->fetch_array()){
  $profit = $row['sum(total_payment)'];
}
  echo"
  <div id='table_header'>
  <!--<button type='submit' id='myBtn'>View By Date</button>-->
   <button><span class='fa fa-calendar' aria-hidden='true'></span> ".date('Y-m-d')." Transactions</button>
   <button>Product Sold: $rowcount1</button>
   <button>Todays Profit: $profit</button>
  <div class='search'>
    <form method='POST' autocomplete='off'>
      <input type='text' placeholder='Search Or#..' name='RS'>
      <button type='submit' name='search'><span class='fa fa-search' aria-hidden='true'></span></button>
    </form>
</div>
</div>
<div id='trans_box' class='table_box'>
<table>";
if($result->num_rows){
  echo"<tr>
    <th>OR #</th>
    <th>Total Quantity</th>
    <th>Total Items</th>
    <th>Discount</th>
    <th>Amount Due/Dosage</th>
    <th>Amount Paid</th>
    <th>Change</th>
    <th>Transactions</th>
    </tr>";
    while($row = $result->fetch_array()){
    echo"
      <tr>
      <td>$row[RS]</td>
      <td>$row[total_qty]</td>
      <td>$row[total_items]</td>
      <td>$row[discount]</td>
      <td>$row[total_payment]</td>
      <td>$row[paid]</td>
      <td>$row[total_change]</td>
      <td><a href='view_transaction.php?RS=$row[RS]'>View <span class='fa fa-eye' aria-hidden='true'></span></a></td>
      </tr>";
  }
}
else if(!empty($_POST['RS'])){
  echo"<script>alert('No Results');window.location.href=('transactions.php');</script>";
}
else{
  echo"<div class='message'>
      No Transactions Today !!!
  </div>";
}
?>
</table>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>
<!---modal for fill up form
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

