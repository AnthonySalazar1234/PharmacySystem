<?php $title="POINT OF SALE"; include"side_nav.php";
require"../php/pos_proc.php";require"../php/connect.php";
?>
<div id="table_header">
<?php 
$all_total = 0;
$sql = "SELECT subtotal FROM sold";
$result=$connect->query($sql);
while($row = $result->fetch_array()){
  $all_total = $all_total + $row['subtotal'];
}
?>
<button type="submit" id="myBtn" >Add Payment +</button>
<button>Total Payment: ₱ <?php echo $all_total ?> </button>
   <div class="search">
    <form method="POST">
      <input type="text" placeholder="Search Medicine..." name="brand_name">
      <button type="submit" name="search">Search</button>
    </form>
</div>
</div>
<form method="POST">
<div class="pos_box">
<div class="column1">
<div>
  <label>Brand Name:</label>
  <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
  <input type="text" name="brand_name" value="<?php echo $brand_name ?>" readonly="">
</div>
<div>
  <label>Generic Name:</label>
  <input type="text" name="generic_name" value="<?php echo $generic_name ?>" readonly="">
</div>
<div>
  <label>Category:</label>
  <input type="text" name="category" value="<?php echo $category ?>" readonly="">
</div>
<div>
  <label>Dosage:</label>
  <input type="text" name="dosage" value="<?php echo $dosage ?>" readonly="">
</div>
<div>
  <label>Expiration Date:</label>
  <input type="text" name="expiration" value="<?php echo $expiration ?>" readonly="">
</div>
<div>
  <label>Price:</label>
  <input type="number" name="price" value="<?php echo $price ?>" readonly="">
</div>
<div>
  <label>Quantity:</label>
  <input type="number" name="qty" min="1" placeholder="Enter Quantity" required="">
</div>
<div>
  <button type="submit" name="add">Add Medicine</button>
</div>
</div>
<div class="column2">
<img src="../image/main.png" class="background">
<table>
  <tr>
      <th>Brand Name</th>
      <th>Generic Name</th>
     <th>Dosage</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Sub Total</th>
      <th>Action</th>
  </tr>
<?php 
    $message = "";
    $total_quantity = 0;
    $sold_product = "SELECT * FROM sold ORDER BY qty";
    $result1 = $connect->query($sold_product);
    $rowcount2 = $result1->num_rows;
    if($result1->num_rows){
    while($row = $result1->fetch_array()){
      $row['product_id'];
      $row['qty'];
      $total_quantity = $total_quantity + $row['qty'];
      $vat = ($row['subtotal'] / 1.12);
    ?>
    <tr>
      <td><?php echo $row['brand_name']; ?></td>
      <td><?php echo $row['generic_name']; ?></td>
      <td><?php echo $row['dosage']; ?></td>
      <td><?php echo $row['qty']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['subtotal']; ?></td>
      <td><a href="../php/delete_sold.php?product_id=<?php echo $row['product_id']; ?>&&qty=<?php echo $row['qty'];?>" onclick = "return confirm('Are you sure you want to cancel order <?php echo $row['brand_name'] ?>')"><img src="../image/delete.png"></a></td>
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
<form method="POST">
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
    <label>Total Items:</label>
  </div>
<div>
  <input type="text" name="total_items" value="<?php echo $rowcount2 ?>" readonly="">
</div>
</div>
<div class="form">
  <div>
    <label>Total Quantity:</label>
  </div>
<div>
  <input type="text" name="total_qty" value=" <?php echo $total_quantity ?>" readonly="">
</div>
</div>
<div class="form">
  <div>
    <label>Vat:</label>
  </div>
<div>
  <input type="text" value="<?php 
      if($vat){
      echo $vat;
      }
      else{
        echo"0.00";
      } ?>"  readonly="">
</div>
</div>
</div>
</form>

<!---modal for payment form-->
<form method="POST">
      <div id="myModal" class="modal">
  <div class="modal-content2">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Payment Transaction</h2>
    </div>
    <div class="modal-body">
      <div class="payment_input">
        <div>
        <label>Total Payment:</label>
        <input type="hidden" name="total_qty" value="<?php echo $total_quantity ?>">
        <input type="hidden" name="total_items" value="<?php printf("%d\n",$rowcount2) ?>">
        <input type="hidden" name="vat" value="<?php echo $vat ?>">
        <input type="text" name="total_payment" value="<?php echo $all_total ?>" readonly="">
      </div>
        <div>
        <label>Paid:</label>
        <input type="number" name="paid" min="1" placeholder="0" required="">
      </div>
        <div>
        <label>Add Discount:</label>
        <select required="" name="discount">
        <option value="0">Select Discount</option>
        <option value="0.10">10%</option>
        <option value="0.15">15%</option>
        <option value="0.20">20%</option>
      </select>
      </div>
       <div>
          <input type="submit" name="payment"  value="Process Payment">
      </div>
      </div>
     </div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>