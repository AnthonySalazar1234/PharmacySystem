<?php $title="ADMIN"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
if(isset($_POST['edit']))
{
  $name = $_FILES['file']['name'];
  $temp = $_FILES['file']['tmp_name'];
  $type = $_FILES['file']['type'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $user_type = $_POST['user_type'];

  move_uploaded_file($temp,"/upload/".$name);
  $edit = "UPDATE user SET firstname = '$firstname', lastname = '$lastname',age = '$age',gender = '$gender',address='$address',contact='$contact',user_type='$user_type',name = '$name',type='$type' WHERE id = '$id'";
  if($result = $connect->query($edit)==TRUE){
    echo "<script>alert('User Info Updated');window.location.href=('admin_edit_info.php?id=$id');</script>";
  }
  else{
    echo "<script>alert('Error to Updated Info');window.location.href=('admin_edit_info.php?id=$id');</script>";
  }
}
$fetch = "SELECT * FROM user WHERE id = '$id'";
$result2 = $connect->query($fetch);
$res = $result2->fetch_assoc();
echo"
<form method='POST' enctype='multipart/form-data'>
<div id='profile_box'>
<div class='profile_header'>
<label><span class='fa fa-edit'></span> Edit Profile</label>
<a href='change_password.php?id=$id'><label><span class='fa fa-mail-forward'></span> Change Password<label></a>
</div>
<div class='img_box'>
 <img src='/upload/$res[name]' id='image-field'>
<div class='upload-btn-wrapper'>
  <button class='upload_btn'>Change Photo <span class='fa fa-image' aria-hidden='true'></span></button>
<input type='file' name='file' id='file-field' onchange='previewImage(event)'/>
</div>
  <button type='submit' name='edit' class='upload_btn'>Save Changes <span class='fa fa-save' aria-hidden='true'></span></button>
</div>
<div class='form_input'>
<div>
  <label>Firstname:</label>
</div>
<div>
  <input type='text' name='firstname' value='$res[firstname]' required=''>
</div>
<div>
  <label>Lastname:</label>
</div>
<div>
  <input type='text' name='lastname' value='$res[lastname]' required=''>
</div>
<div>
  <label>Birthdate:</label>
</div>
<div>
  <input type='text' value='$res[birthdate]' required=''>
</div>
<div>
  <label>Age:</label>
</div>
<div>
  <input type='number' name='age' value='$res[age]' required=''>
</div>
</div>
<div class='form_input'>
<div>
  <label>Address:</label>
</div>
<div>
  <input type='text' name='address' value='$res[address]' required=''>
</div>
<div>
  <label>Contact #:</label>
</div>
<div>
  <input type='number' name='contact' value='$res[contact]' required=''>
</div>
<div>
  <label>Gender:</label>
</div>
<div>
<select required='' name='gender'>
<option>$res[gender]</option>
<option>------------</option>
<option value='Male'>Male</option>
<option value='Female'>Female</option>
<option>------------</option>
</select>
</div>
<div>
  <label>Position:</label>
</div>
<div>
<select required='' name='user_type'>
<option>$res[user_type]</option>
<option>------------</option>
<option value='admin'>Admin</option>
<option value='user'>User</option>
<option>------------</option>
</select>
</div>
</div>
</div>  
</form>
<script src='/R&S/js/prev_pic.js'></script>
";
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>