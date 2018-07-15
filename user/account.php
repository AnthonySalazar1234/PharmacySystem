<?php $title="ADMIN ACCOUNT"; include"side_nav.php"; 
require"../php/connect.php";
$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
$res = mysqli_fetch_assoc($result);
?>
<div id="profile_box">
<div class="profile_header">
<label>Profile</label>
<a href="changepassword.php">
<label>Change Password</label></a>
</div>
<div class="img_box">
 <img src="../upload/<?php echo $res['name'] ?>">
<div class="upload-btn-wrapper">
  <button class="upload_btn" id="myBtn">Change Photo</button>
  <!--<button class="upload_btn">Save Info</button>-->
</div>
</div>
<div class="form_input">
<div>
  <label>Name:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['lastname'];?>" readonly="">
</div>
<div>
  <label>Birthdate:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['birthdate'] ?>" readonly="">
</div>
<div>
  <label>Age:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['age'] ?>" readonly="">
</div>
<div>
  <label>Gender:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['gender'] ?>" readonly="">
</div>
</div>
<div class="form_input">
<div>
  <label>Address:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['address'] ?>" readonly="">
</div>
<div>
  <label>Contact #:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['contact'] ?>" readonly="">
</div>
<div>
  <label>Username:</label>
</div>
<div>
  <input type="text" name="" value="<?php echo $_SESSION['username'] ?>" readonly="">
</div>
<div>
  <label>Position:</label>
</div>
<div>
  <input type="text" value="<?php echo $_SESSION['user_type'] ?>" readonly>
</div>
</div>
</div>
<?php
if(isset($_POST['upload']))
{ 
  //  $id = $_SESSION['id'];
  $name = $_FILES['file']['name'];
  $temp = $_FILES['file']['tmp_name'];
  $type = $_FILES['file']['type'];

if ((strtolower($type) != "image/jpg") && (strtolower($type) != "image/jpeg") && (strtolower($type) != "image/png") && (strtolower($type) != "image/gif"))
{
   echo "<script>alert('Error Uploading Image');window.location.href=('account.php');</script>";
}
else{
move_uploaded_file($temp,"../upload/".$name);
$upload = mysqli_query($connect, "UPDATE user SET name = '$name', type = '$type' WHERE id = '$id'");
  echo "<script>alert('Successfuly Upload Image');window.location.href=('account.php');</script>";

}
}
?>
<form method="POST" enctype="multipart/form-data">
      <div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Upload Photo</h2>
    </div>
    <div class="modal-body">
      <div class="box">
        <img src="../image/user.png" id="image-field">
        <div class="upload-btn-wrapper">
  <button class="upload">Choose Image</button>
 <input type='file' name="file" id="file-field" onchange="previewImage(event)" required="" />
</div>
<button type="submit" name="upload" class="upload" >Upload</button>
</div>
</div>
 </div>
</form>
<script src="../js/modal_form.js"></script>
<script src="../js/prev_pic.js"></script>