<?php $title="ADMIN ACCOUNT"; include"side_nav.php";
 echo"
<div id='profile_box'>
<div class='profile_header'>
<label>Profile</label>
<a href='change_password.php'><label>Change Password</label></a>
</div>
<div class='img_box'>
 <img src='../upload/$name'>
<div class='upload-btn-wrapper'>
  <button class='upload_btn' id='myBtn'>Change Photo</button>
</div>
</div>
<div class='form_input'>
<div>
  <label>Name:</label>
</div>
<div>
  <input type='text' value='$firstname $lastname' readonly=''>
</div>
<div>
  <label>Birthdate:</label>
</div>
<div>
  <input type='text' name='' value='$birthdate' readonly=''>
</div>
<div>
  <label>Age:</label>
</div>
<div>
  <input type='text' value='$age' readonly=''>
</div>
<div>
  <label>Gender:</label>
</div>
<div>
  <input type='text' value='$gender' readonly=''>
</div>
</div>
<div class='form_input'>
<div>
  <label>Address:</label>
</div>
<div>
  <input type='text' value='$address' readonly=''>
</div>
<div>
  <label>Contact #:</label>
</div>
<div>
  <input type='text' name='' value='$contact' readonly=''>
</div>
<div>
  <label>Username:</label>
</div>
<div>
  <input type='text' value='$username' readonly=''>
</div>
<div>
  <label>Position:</label>
</div>
<div>
  <input type='text' value='$user_type' readonly>
</div>
</div>
</div>  

<form method='POST' enctype='multipart/form-data'>
      <div id='myModal' class='modal'>
  <div class='modal-content'>
    <div class='modal-header'>
      <span class='close'>&times;</span>
      <h2>Upload Photo</h2>
    </div>
    <div class= 'modal-body'>
      <div class='box'>
        <img src='../image/user.png' id='image-field'>
        <div class='upload-btn-wrapper'>
  <button class='upload'>Choose Image</button>
 <input type='file' name='file' id='file-field' onchange='previewImage(event)' required='' />
</div>
<button type='submit' name='upload' class='upload' >Upload</button>
</div>
</div>
 </div>
</form>
<script src='../js/modal_form.js'></script>
<script src='../js/prev_pic.js'></script>
";
?>