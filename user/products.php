<?php $title="INVENTORY"; include"side_nav.php"; 
require'../php/connect.php';
$sql = "SELECT * FROM inventory";
if($result = $connect->query($sql)){
  $rowcount = $result->num_rows;
}
$sql1 ="SELECT * FROM inventory WHERE quantity <= 10";
if($result1 = $connect->query($sql1)){
$rowcount1 = $result1->num_rows;
}
$date3 =  date('Y-m-d', time());
$sql2 ="SELECT * FROM inventory WHERE expiration <= '$date3'";
if($result2 = $connect->query($sql2)){
$rowcount2 = $result2->num_rows;
}
?>
<div id="table_header">
<button type="submit" id="myBtn">Add Medicine +</button>
<button type="submit" >No. of Medicine: <?php echo $rowcount ?></button>
<button type="submit" style="background-color:#c94040">Expired Products : <?php  echo $rowcount2 ?> </button>
<button type="submit" style="background-color:#ffa96a">Below Quantity of 10 : <?php echo $rowcount1 ?> </button>
   <div class="search">
  <form method="POST">
      <input type="text" placeholder="Search Medicine..." name="brand_name">
      <button type="submit" name="search">Search</button>
    </form>
</div>
</div>
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
  $brand_name = $_POST['brand_name'];
  $sql = "SELECT * FROM inventory WHERE brand_name LIKE '%$brand_name' ORDER BY expiration ASC";
  $result = $connect->query($sql);
  }
  else{
  $message="";
  $sql = "SELECT * FROM inventory ORDER BY expiration ASC"; 
  $result = $connect->query($sql);
}
    if($result->num_rows){
    while($row = mysqli_fetch_array($result)){
      date_default_timezone_get('Asia,Manila');
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
      <td><a href="edit_med.php?product_id=<?php echo $row['product_id'] ?>"><img src="../image/edit.png" title="Edit Info"></a><a href="../php/med_delete.php?product_id=<?php echo $row['product_id'] ?>"><img src="../image/delete1.png" title="Delete Info" onclick="return confirm('Are you sure you want to delete this medicine')"></a></td>
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
      <td><a href="edit_med.php?product_id=<?php echo $row['product_id'] ?>"><img src="../image/edit.png" title="Edit Info"></a><a href="../php/med_delete.php?product_id=<?php echo $row['product_id'] ?>"><img src="../image/delete1.png" title="Delete Info" onclick="return confirm('Are you sure you want to delete this medicine')"></a></td>
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
      <td><a href="edit_med.php?product_id=<?php echo $row['product_id'] ?>"><img src="../image/edit.png" title="Edit Info"></a><a href="../php/med_delete.php?product_id=<?php echo $row['product_id']?>"><img src="../image/delete1.png" title="Delete Info" onclick="return confirm('Are you sure you want to delete <?php echo  $row[brand_name]?>')"></a></td>
    </tr>
        <?php }
      }
    }
    else if(!empty($_POST['brand_name'])){
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
<form method="POST" action="../php/add_med.php">
      <div id="myModal" class="modal">
  <div class="modal-content1">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add New Medicine</h2>
    </div>
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
            <option >Select Category</option>
            <option value="Tablet">Tablet</option>
            <option value="Capsule">Capsule</option>
            <option value="Syrup">Syrup</option>
            <option value="Softgel Capsule">Softgel Capsule</option>
            <option value="Caplet">Caplet</option>
          </select>
        </div>
         <div>
          <select required name="type">
            <option >Select Description</option>
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
              <button type="submit" name="add" class="add">Add New Medicine</button>
      </div>

       <div class="modal_input">
        <div>
          <!-- <input type="text" name="manufactured" class="tcal" placeholder="Enter Manufatured Date">-->
          <input type="text" name="manufactured" placeholder="Enter Manufatured Date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required="">
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
          <?php 
          $fetch = mysqli_query($connect,"SELECT * FROM suppliers");
          while($row = mysqli_fetch_array($fetch)){
          ?>
         <select required name="manufacturer">
            <option >Select Supplier</option>
            <option value="<?php echo $row['supplier_name']; ?>"><?php echo $row['supplier_name']; ?></option>
          </select>
          <?php  
        }
        ?>
        </div>
      </div>
</div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>
