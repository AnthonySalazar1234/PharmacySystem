<?php $title="SUPPLIERS"; include"side_nav.php";?>
<div class="admin_header">
<button type="submit" id="myBtn">Add Supplier +</button>
 <div class="search">
    <form method="POST">
      <input type="text" placeholder="Search Supplier..." name="supplier_name">
      <button type="submit" name="search">Search</button>
    </form>
</div>
</div>
<div id="admin_panel">
<div>
  <table>
    <tr>
    <th>Supplier Name</th>
    <th>Contact Person</th>
    <th>Address</th>
    <th>Contact #</th>
    <th>Email</th>
    <th>Note</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  <?php require'../php/connect.php';
   if(isset($_POST['search'])){
  $supplier_name = $_POST['supplier_name'];
  $message="";
   $sql = "SELECT * FROM suppliers WHERE supplier_name LIKE '%$supplier_name'";
  $result = mysqli_query($connect,$sql);
  }
  else{
  $message="";
  $sql = "SELECT * FROM suppliers";
  $result = mysqli_query($connect,$sql);
  }
    if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_array($result)){
    ?>
  <tr>
    <td><?php echo $row['supplier_name'] ?></td>
    <td><?php echo $row['contact_person'] ?></td>
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['contact'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['note'] ?></td>
    <td><?php echo $row['date'] ?></td>
     <td><a href="supplier_edit.php?id=<?php echo $row['id'];?>"><img src="../image/edit.png" title="Edit Info"></a><a href="../php/delete_supplier.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['supplier_name'] ?>')"><img src="../image/delete1.png" title="Delete Info"></td></a>
  </tr>
    <?php }}
    else if(!empty($_POST['supplier_name'])){
      echo"<script>alert('No Results Found');window.location.href=('supplier.php');</script>";
    }
  else{
    $message = "<div class='message'>No Admin Created</div>";
  }
  ?>
  </table>
  <?php echo $message; ?>
</div>
</div>

<!---Modal reg-->
<form method="POST"  action="../php/add_supplier.php">
      <div id="myModal" class="modal">
  <div class="modal-content2">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add Supplier</h2>
    </div>
    <div class="modal-body">
       <div class="supplier_input">
        <div>
          <input type="text" name="supplier_name" placeholder="Enter Supplier Name" required="">
        </div>
         <div>
          <input type="text" name="contact_person" placeholder="Enter Contact Person" required="">
        </div>
          <div>
          <input type="text" name="address" placeholder="Enter Address" required="">
        </div>
         <div>
          <input type="number" name="contact" placeholder="Enter Contact #" required="">
        </div>
         <div>
          <input type="email" name="email" placeholder="Enter Email" required="email">
        </div>
         <div>
          <textarea name="note" required="" placeholder="Enter Note"></textarea>
        </div>
        <div>
          <button type="submit" name="add">Save</button>
        </div>
        </div>
      </div>
</div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>
<script src="../js/prev_pic.js"></script>