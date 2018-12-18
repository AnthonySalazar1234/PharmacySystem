<?php $title="ADMIN ACCOUNT"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
if(isset($_POST['upload']))
{ 
  $name = $_FILES['file']['name'];
  $temp = $_FILES['file']['tmp_name'];
  $type = $_FILES['file']['type'];

if ((strtolower($type) != "image/jpg") && (strtolower($type) != "image/jpeg") && (strtolower($type) != "image/png") && (strtolower($type) != "image/gif"))
{
   echo "<script>alert('Error Uploading Image');window.location.href=('account.php');</script>";
}
else{
move_uploaded_file($temp,"/upload/".$name);
$upload = mysqli_query($connect, "UPDATE user SET name = '$name', type = '$type' WHERE id = '$id'");
  echo "<script>alert('Successfuly Upload Image');window.location.href=('account.php');</script>";

}
}
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = $connect->query($sql);
$res = $result->fetch_assoc();
echo"
<div id='profile_box'>
<div class='profile_header'>
<label><span class='fa fa-user'></span> Profile</label>
</div>
<div class='img_box'>
 <img src='/upload/$res[name]'>
<div class='upload-btn-wrapper'>
  <button class='upload_btn' id='myBtn'>Change Photo  <span class='fa fa-file-image-o' aria-hidden='true'></span></button>
  <!--<button class='upload_btn'>Save Info</button>-->
</div>
</div>
<div class='form_input'>
<div>
  <label>Name:</label>
</div>
<div>
  <input type='text' name='' value='$firstname $lastname' readonly=''>
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
  <input type='text' name='' value='$age' readonly=''>
</div>
<div>
  <label>Gender:</label>
</div>
<div>
  <input type='text' name='' value='$gender' readonly=''>
</div>
</div>
<div class='form_input'>
<div>
  <label>Address:</label>
</div>
<div>
  <input type='text' name='' value='$address'  readonly=''>
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
  <input type='text' name='' value='$username' readonly=''>
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
    <div class='modal-body'>
      <div class='box'>
        <img src='../image/user.png' id='image-field'>
        <div class='upload-btn-wrapper'>
  <button class='upload'>Choose Image  <span class='fa fa-image' aria-hidden='true'></span></button>
 <input type='file' name='file' id='file-field' onchange='previewImage(event)' required='' />
</div>
<button type='submit' name='upload' class='upload' >Upload <span class='fa fa-upload' aria-hidden='true'></span></button>
</div>
</div>
 </div>
</form>
<script src='../js/modal_form.js'></script>
<script src='../js/prev_pic.js'></script>
";
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>