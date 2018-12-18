<?php $title="USERS"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); ?>
<div class="admin_header">
<button type="submit" id="myBtn">Add Users <span class='fa fa-plus-circle' aria-hidden='true'></span></button>
 <div class="search">
    <form method="POST" autocomplete="off">
      <input type="text" placeholder="Search Firstname..." name="firstname">
      <button type="submit" name="search"><span class='fa fa-search' aria-hidden='true'></span></button>
    </form>
</div>
</div>
<div id="admin_panel">
<div>
  <table>
    <tr>
    <th>Name</th>
    <th>Birthdate</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Contact#</th>
    <th>Position</th>
    <th>Action</th>
  </tr>
  <?php require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');  
   if(isset($_POST['search'])){
  $user = $_GET['user'];
  $firstname = $_POST['firstname'];
  $message="";
   $sql = "SELECT * FROM user WHERE firstname LIKE '%$firstname' AND user_type = 'user'";
  $result = $connect->query($sql);
  }
  else{
  $message="";
  $sql = "SELECT * FROM user WHERE user_type = 'user'";
  $result = $connect->query($sql);
  }
    if($result->num_rows){
    while($row = $result->fetch_array()){
    echo"
  <tr>
    <td>$row[firstname] $row[lastname]</td>
    <td> $row[birthdate]</td>
    <td> $row[age]</td>
    <td> $row[gender]</td>
    <td> $row[address]</td>
    <td> $row[contact]</td>
    <td> $row[user_type]</td>
     <td><a href='admin_edit_info.php?id=$row[id]'><img src='../image/edit.png' title='Edit Info'></a><a href='php/delete_user.php?id=$row[id]&&user=$row[user_type]'><img src='../image/delete1.png' title='Delete Info'></td></a>
    <!--<td><a href='admin_edit_info.php?id=$row[id]'><img src='../image/edit.png' title='Edit Info'></a><a href='php/delete_user.php?id=$row[id]&&user=$row[user_type]' onclick='return confirm('Are you sure you want to delete this $user_type')'><img src='../image/delete1.png' title='Delete Info'></td></a>-->
  </tr>";
  }}
    else if(!empty($_POST['firstname'])){
      echo"<script>alert('No Results Found');window.location.href=('user.php');</script>";
    }
  else{
    echo "<div class='message'>No Acoount Created</div>";
  }
  ?>
  </table>
</div>
</div>

<!---Modal reg-->
<form method="POST" enctype="multipart/form-data" action="php/user_reg.php" autocomplete="off">
  <div id="myModal" class="modal">
  <div class="modal-content3">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2><span class='fa fa-users' aria-hidden='true'></span> Add New Users</h2>
    </div>
    <div class="modal-body">
       <div class="user_input">
        <div class="img_box_pic">
          <img src="../image/user.png" id="image-field">
          <div class="upload-btn-wrapper">
        <button class="upload"><span class='fa fa-image' aria-hidden='true'></span> Choose Image</button>
        <input type='file' name="file" id="file-field" onchange="previewImage(event)"/ required="">
          </div>
           <button type="submit" name="reg"><span class='fa fa-save' aria-hidden='true'></span> Save Info</button>
        </div>
        <div class="column1">
          <div>
          <input type="text" name="firstname" placeholder="Enter Firstname" required="">
          </div>
          <div>
          <input type="text" name="lastname" placeholder="Enter Lastname" required="">
          </div>
          <div>
          <div>
            <label>Birthdate</label>
          </div>
          <div>
       <select required name="month" class="bdate" style="width: 95px;">
        <?php
       $month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
          echo"<option selected='selected'>Month</option>";
          foreach($month_names as $month)
          {
          echo "<option>".$month."</option>";
           }
          ?>
        </select>
          <select required="" name="date" class="bdate">
            <option>Date</option>
            <?php 
          for($i = 1; $i <= 31; $i++){
          echo "<option value='$i'>$i</option>";
          }
            ?>
          </select>
          <select required="" name="year" class="bdate">
            <option>Year</option>
            <?php 
          for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
          echo "<option value='$i'>$i</option>";
            }
              ?>
          </select>
          </div>
          <div>
          </div>
          <input type="number" name="age" min="1" placeholder="Enter Age" required="">
          </div>
            <div>
          <select required="" name="gender" class="gender">
           <option selected="selected">Select Gender</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
         </select>
          </div>
        </div>
         <div class="column1">
          <div>
          <input type="text" name="address" placeholder="Enter Address" required="">
          </div>
          <div>
          <input type="number" min="0" name="contact" placeholder="Enter Contact#" required="">
          </div>
          <div>
         <select required="" name="user_type" class="gender">
           <option selected="selected">Select Position</option>
           <option value="admin">admin</option>
           <option value="user">user</option>
         </select>
          </div>
          <div>
          <input type="text" name="username" placeholder="Enter Username" required="">
          </div>
          <div>
          <input type="password" name="password" placeholder="Enter Password" required="">
          </div>
        </div>
      </div>
</div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>
<script src="../js/prev_pic.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>