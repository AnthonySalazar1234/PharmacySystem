<?php $title="ADMIN"; include"side_nav.php"; require"../php/connect.php";
if(isset($_POST['edit']))
{
  $name = $_FILES['file']['name'];
  $temp = $_FILES['file']['tmp_name'];
  $type = $_FILES['file']['type'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$user_type = $_POST['user_type'];
$sql = "SELECT * FROM user WHERE contact = '$contact'";
$result = $connect->query($sql);
$count = $result->num_rows;
move_uploaded_file($temp,"../upload/".$name);
$edit = $connect->prepare("UPDATE user SET name = '$name',type='$type',address='$address',contact='$contact',user_type='$user_type' WHERE id = '$id'");
  if($edit->execute()==TRUE){
    echo"<script>alert('User info updated');window.location.href=('user.php');</script>";
  }
  else if($count!=0){
       echo "<script>alert('Sorry you have enter existing contact');window.location.href=('edit_info.php?id=$id');</script>";
    }
  else{
    echo"Error";
  }
}
$fetch = "SELECT * FROM user WHERE id = '$id'";
$result1 = $connect->query($fetch);
if($result1->num_rows){
while($row = $result1->fetch_array()){
echo"
<form method='POST' enctype='multipart/form-data'>
<div id='edit_user'>
<div class='edit_header'>
<label>Edit Information</label>
</div>
<div class='user_input'>
        <div class='img_box_pic1'>
          <img src='../upload/$row[name]' id='image-field'>
          <div class='upload-btn-wrapper'>
        <button class='upload'>Choose Image</button>
        <input type='file' name='file' id='file-field' onchange='previewImage(event)'/>
          </div>
           <button type='submit' name='edit'>Save Info</button>
        </div>
<div class='column1'>
          <div>
          <input type='text' value='$row[firstname]' readonly=''>
          </div>
          <div>
          <input type='text' value='$row[lastname]'  readonly=''>
          </div>
          <div>
             <input type='text'  value='$row[birthdate]' readonly=''>
          </div>
          <div>
          <input type='number' value='$row[age]' readonly=''>
          </div>
        </div>
           <div class='column1'>
          <div>
          <select readonly='' name='gender' class='gender'>
            <option>$row[gender]</option>
         </select>
          </div>
          <div>
          <input type='text' name='address' value='$row[address]' placeholder='Enter Address' required=''>
          </div>
          <div>
          <input type='number' name='contact' value='$row[contact]' placeholder='Enter Contact#' required=''>
          </div>
          <div>
         <select required='' name='user_type' class='gender'>
         	<option style='background-color: skyblue;'>$row[user_type]</option>
           <option value='admin'>admin</option>
           <option value='user'>user</option>
         </select>
          </div>
        </div>
</div>
</form>
<script src='../js/prev_pic.js'></script>
";
}}
else if(empty($id)){
  echo"<div class='message'>
  <label>Empty Data</<label>
  </div>";
}
else{
  echo"<div class='message'>
  <label>Error</label>
  </div>";
}
?>