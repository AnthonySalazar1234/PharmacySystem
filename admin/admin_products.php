<?php $title="INVENTORY"; 
include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
date_default_timezone_set('Asia/Manila');
$sql = "SELECT * FROM inventory";
$result = $connect->query($sql);
$rowcount = $result->num_rows;
$sql1 ="SELECT * FROM inventory WHERE quantity <= 10";
$result1 = $connect->query($sql1);
$rowcount1 = $result1->num_rows;
$remind = "<span class='fa fa-exclamation-circle' aria-hidden='true'></span>";
$date3 =  date('Y-m-d', time());
$sql2 ="SELECT * FROM inventory WHERE expiration <= '$date3'";
$result2 = $connect->query($sql2);
$rowcount2 = $result2->num_rows;
echo"
<div id='table_header'>
<button type='submit' id='myBtn'>Add Medicine <span class='fa fa-plus-circle' aria-hidden='true'></span></button>
<button>No. of Medicines: $rowcount</button>
<button class='exp'><span class='fa fa-exclamation-triangle' aria-hidden='true'></span> Expired: $rowcount2</button>
<button class='qty'><span class='fa fa-exclamation-circle' aria-hidden='true'></span> Low Quanity: $rowcount1</button>
   <div class='search'>
  <form method='POST' autocomplete='off'>
      <input type='text' placeholder='Search...' name='ValueToSearch'>
      <button type='submit' name='search'><span class='fa fa-search'></span></button>
    </form>
</div>
</div>";?>
<div class="table_box">
  <table>
    <tr>
      <th>Brand Name</th>
      <th>Generic Name</th>
      <th>Category</th>
      <th>Description</th>
      <th>Dosage</th>
      <th>Entry Date</th>
      <th>Manufactured Date</th>
      <th>Expiration Date</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
    <?php
     if(isset($_POST['search'])){
  $message = "";
  $ValueToSearch = $_POST['ValueToSearch'];
  $sql = "SELECT * FROM inventory WHERE CONCAT(`brand_name`,`category`) LIKE '%".$ValueToSearch."%'";
  $result = mysqli_query($connect,$sql);
  }
  else{
  $message="";
  $sql = "SELECT * FROM inventory ORDER BY expiration ASC"; 
  $result = $connect->query($sql);
}
    if($result->num_rows){
    while($row = $result->fetch_array()){
        $product_id = $row['product_id'];
        $qty = $row['quantity'];
    $expiration = $row['expiration'];
    $date1 = time();

    $date2  = date('Y-m-d', $date1);

    if($expiration <= $date2){
    ?>

    <tr style="background-color:#c94040;color: #fff; font-weight: bold;">
      <td><?php echo $row['brand_name']?></td>
      <td><?php echo $row['generic_name'] ?></td>
      <td><?php echo $row['category']?></td>
      <td><?php echo $row['type']?></td>
      <td><?php echo $row['dosage']?></td>
       <td><?php echo $row['date']?></td>
      <td><?php echo $row['manufactured']?></td>
      <td><?php echo $row['expiration']?></td>
      <td><?php echo $row['quantity']?></td>
      <td><?php echo $row['price'] ?></td>
    <td><a href="admin_edit_med.php?product_id=<?php echo $row['product_id'] ?>"><img src="/image/edit.png" title="Edit Info"></a><a href="php/med_delete.php?product_id=<?php echo $row['product_id'] ?>"><img src="/image/delete1.png" title="Delete Info" onclick="return confirm('Are you sure you want to delete this medicine')"></a></td>
    </tr>

     <?php  
    }
    else if($qty<=10){
    ?>
<tr style="background-color:#ffa96a; color: #fff; font-weight: bold;">
      <td><?php echo $row['brand_name']?></td>
      <td><?php echo $row['generic_name'] ?></td>
      <td><?php echo $row['category']?></td>
      <td><?php echo $row['type']?></td>
      <td><?php echo $row['dosage']?></td>
       <td><?php echo $row['date']?></td>
      <td><?php echo $row['manufactured']?></td>
      <td><?php echo $row['expiration']?></td>
      <td><?php echo $row['quantity']?></td>
      <td><?php echo $row['price'] ?></td>
    <td><a href="admin_edit_med.php?product_id=<?php echo $row['product_id'] ?>"><img src="/image/edit.png" title="Edit Info"></a><a href="php/med_delete.php?product_id=<?php echo $row['product_id'] ?>"><img src="/image/delete1.png" title="Delete Info" onclick="return confirm('Are you sure you want to delete this medicine')"></a></td>
    </tr>
<?php 
}
    else {

        ?>

    <tr>
      <td><?php echo $row['brand_name']?></td>
      <td><?php echo $row['generic_name']?></td>
      <td><?php echo $row['category']?></td>
      <td><?php echo $row['type']?></td>
      <td><?php echo $row['dosage']?></td>
      <td><?php echo $row['date']?></td>
      <td><?php echo $row['manufactured']?></td>
      <td><?php echo $row['expiration']?></td>
      <td><?php echo $row['quantity']?></td>
      <td><?php echo $row['price'] ?></td>
    <td><a href="admin_edit_med.php?product_id=<?php echo $row['product_id'] ?>"><img src="/image/edit.png" title="Edit Info"></a><a href="php/med_delete.php?product_id=<?php echo $row['product_id'] ?>"><img src="/image/delete1.png" title="Delete Info" onclick="return confirm('Are you sure you want to delete this medicine')"></a></td>
    </tr>
        <?php }
      }
    }
    else if(!empty($_POST['ValueToSearch'])){
        echo"<script>alert('No Results Found');window.location.href=('products.php');</script>";
    }
    else{
      $message="( No Medicine Added )";
    }
  ?>
  </table>
  <div class="message">
   <?php 
   echo $message;
    ?>
 </div>
</div>

<!---modal for fill up form-->
      <div id="myModal" class="modal">
  <div class="modal-content1">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add New Medicine</h2>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" autocomplete="off">
    <div class="modal-body">
      <div class="modal_input">
        <div>
          <input type="text" name="brand_name" placeholder="Enter Brand Name" required="">
        </div>
         <div>
          <input type="text" name="generic_name" placeholder="Enter Generic Name" required="">
        </div>
         <div>
          <select required name="category">
            <option value="">Select Category</option>
            <option value="Tablet">Tablet</option>
            <option value="Capsule">Capsule</option>
            <option value="Syrup">Syrup</option>
            <option value="Softgel Capsule">Softgel Capsule</option>
            <option value="Caplet">Caplet</option>
          </select>
        </div>
         <div>
          <select required name="type">
            <option value="">Select Description</option>
            <option value="Cough & Colds">Cough & Colds</option>
            <option value="Body & Muscle Pain">Body & Muscle Pain</option>
            <option value="Headache,Fever & Flu">Headache,Fever & Flu</option>
            <option value="Allergy">Allergy</option>
            <option value="Vitamins">Vitamins</option>
            <option value="Healthy Aging Seniors">Healthy Aging Seniors</option>
          </select>
        </div>
         <div>
          <input type="text" name="dosage" placeholder="Enter Dosage(eg:500mg)" required="">
        </div>
              <button type="submit" name="add" class="add"><span class='fa fa-plus'></span> Add New Medicine</button>
      </div>

       <div class="modal_input">
        <div>
          <!-- <input type="text" name="manufactured" class="tcal" placeholder="Enter Manufatured Date">-->
          <input type="text" name="manufactured" placeholder="Enter Manufactured Date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required="">
        </div>
        <div>
           <!--<input type="text" name="expiration" class="tcal" placeholder="Enter Expiration">-->
            <input  type="text" name="expiration" placeholder="Enter Expiration Date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required="">
        </div>
          <div>
           <input type="number" name="quantity" min="1" placeholder="Enter Quantity" required="">
        </div>
          <div>
           <input type="number" name="price" min="1" placeholder="Enter Price">
        </div>
          <div>
       <select required name="manufacturer">
        <option value="">Select Supplier</option>
          <?php 
          $supp ="SELECT * FROM suppliers";
          $result3 = $connect->query($supp);
          while($row = $result3->fetch_array()){
          echo"
            <option value='$row[supplier_name]'>$row[supplier_name]</option>
              ";
        }
        ?>
         </select>
        </div>
      </div>
</div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>