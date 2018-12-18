<?php $title="POINT OF SALE"; 
include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/pos_proc.php');
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
date_default_timezone_set('Asia/Manila');
$all_total = 0;
$sql = "SELECT * FROM sold";
$result=$connect->query($sql);
while($row = $result->fetch_array()){
  $all_total = $all_total + $row['subtotal'];
  $brand = $row['brand_name'];
} 
if(!empty($brand)){
  $disabled = 'disabled';
  $btn = 'myBtn';
  $search_icon = "<span class='fa fa-search-plus' aria-hidden='true'></span>";
  $color = 'red';
}else{
  $disabled = '';
  $btn = '';
  $search_icon = "<span class='fa fa-search' aria-hidden='true'></span>";
}
$date_today = date('Y-m-d');
$cust_total = "SELECT * FROM payment WHERE date_paid = '$date_today'";
$cust_result = $connect->query($cust_total);
$rowcount3 = $cust_result->num_rows;
echo"
<div id='table_header'>
<div>
<button type='submit' id='".$btn."' '".$disabled."'  style='background-color:$color'>Add Payment <span class='fa fa-plus-circle' aria-hidden='true'></span></button>
<button>Payment: ₱ $all_total</button>
<button type='submit' name='cancel'><span class='fa fa-users'></span> Customer(s): $rowcount3</button>
<button><span class='fa fa-clock-o' aria-hidden='true'></span> <span id='clock'></span></button>
<button><span class='fa fa-calendar' aria-hidden='true'></span> ".date('m/d/Y')."</button>
   <div class='search'>
   <form method='POST' action='".htmlspecialchars($_SERVER['PHP_SELF'])."' autocomplete='off'>
      <input type='text' placeholder='Search Medicine...' name='brand_name'>
      <button type='submit' name='search'>".$search_icon."</button>
    </form>
</div>
</div>
</div>
<form method='POST'  action='".htmlspecialchars($_SERVER['PHP_SELF'])."' autocomplete='off'>
<div class='pos_box'>
<div class='column1'>
<div>
  <label>Brand Name:</label>
  <input type='hidden' name='product_id' value='$product_id'>
  <input type='text' name='brand_name' value='$brand_name' readonly=''>
</div>
<div>
  <label>Generic Name:</label>
  <input type='text' name='generic_name' value='$generic_name' readonly=''>
</div>
<div>
  <label>Category:</label>
  <input type='text' name='category' value='$category' readonly=''>
</div>
<div>
  <label>Dosage:</label>
  <input type='text' name='dosage' value='$dosage' readonly=''>
</div>
<div>
  <label>Expiration Date:</label>
  <input type='text' name='expiration' value='$expiration' readonly=''>
</div>
<div>
  <label>Price:</label>
  <input type='text' name='price' value='$price' readonly=''>
</div>
<div>
  <label>Quantity:</label>
  <input type='number' name='qty' min='1' placeholder='Enter Quantity' required=''>
</div>
<div>
  <button type='submit' name='add'>Add Medicine <span class='fa fa-plus-square' aria-hidden='true'></span></button>
</div>
</div>
<div class='column2'>
<img src='../image/med_icon1.png' class='background'>";
?>
<table>
  <tr>
      <th>Brand Name</th>
      <th>Generic Name</th>
      <th>Expiration</th>
      <th>Dosage</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Sub Total</th>
      <th>Action</th>
  </tr>
<?php 
    $message = "";
    $total_quantity = 0;
    $sold_product = "SELECT * FROM sold ORDER BY qty ASC";
    $result1 = $connect->query($sold_product);
    $rowcount2 = $result1->num_rows;
    if($result1->num_rows){
    while($row = $result1->fetch_array()){
      $row['product_id'];
      $row['qty'];
      $total_quantity = $total_quantity + $row['qty'];
      $vat = ($all_total/1.12);
    echo"
    <tr>
      <td>$row[brand_name]</td>
      <td>$row[generic_name]</td>
      <td>$row[expiration]</td>
      <td>$row[dosage]</td>
      <td>$row[qty]</td>
      <td>$row[price]</td>
      <td>$row[subtotal]</td>";?>
      <td><a href="/php/delete_sold.php?product_id=<?php echo $row['product_id']; ?>&&qty=<?php echo $row['qty'];?>" onclick = "return confirm('Are you sure you want to cancel order <?php echo $row['brand_name'] ?>')"><img src="/image/delete.png"></a></td>
    </tr>
    <?php }}
    else{
      $message="No Added Medicine";
    }
     ?>
  </table>
   <div class="message1">
   <?php 
   echo $message;
    ?>
 </div>
</div>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
<div class="column3">
 <div class="form">
  <div>
    <label>Remaining Quantity:</label>
  </div>
<div>
  <input type="text" value="<?php 
      if($quantity){
      echo $quantity;
      }
      else{
        echo"0";
      } ?>" readonly="">
</div>
</div>
<div class="form">
  <div>
    <label>No. of Items:</label>
  </div>
<div>
  <input type="text" name="total_items" value="<?php echo $rowcount2 ?>" readonly="">
</div>
</div>
<div class="form">
  <div>
    <label>Total Sold Quantity:</label>
  </div>
<div>
  <input type="text" name="total_qty" value=" <?php echo $total_quantity ?>" readonly="">
</div>
</div>
<div class="form">
  <div>
    <label>Vat(12%):</label>
  </div>
<div>
  <input type="text" value="<?php 
if($vat){
echo round($vat,2,PHP_ROUND_HALF_DOWN);
}
else{
echo"0.00";
} ?>"  readonly="">
</div>
</div>
</div>
</form>
<!---modal for payment form-->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div id="myModal" class="modal">
  <div class="modal-content2">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2><span class="fa fa-credit-card" aria-hidden='true'></span> Payment Transaction</h2>
    </div>
    <div class="modal-body">
      <div class="payment_input">
        <div>
        <p>Total Payment:</p>
        <input type="hidden" name="total_qty" value="<?php echo $total_quantity ?>">
        <input type="hidden" name="total_items" value="<?php echo $rowcount2 ?>">
        <input type="hidden" name="vat" value="<?php echo round($vat,2,PHP_ROUND_HALF_DOWN); ?>">
        <input type="text" name="total_payment" value="<?php echo $all_total ?>" readonly="">
      </div>
        <div>
        <p>Amount Paid:</p>
        <input type="number" name="paid" min="1" placeholder="0" required="">
      </div>
        <div>
        <p>Add Discount:</p>
        <select required name="discount">
        <option value="0">Select Discount</option>
        <option value="0.10">10%</option>
        <option value="0.15">15%</option>
        <option value="0.20">20%</option>
      </select>
      </div>
       <div>
          <button type="submit" name="payment" class="btn_paymentinput"><span class="fa fa-spinner" aria-hidden='true'></span> Process Payment</button>
      </div>
      </div>
     </div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>