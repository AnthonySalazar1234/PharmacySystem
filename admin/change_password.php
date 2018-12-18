<?php $title="ADMIN"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
$res = mysqli_fetch_assoc($result);

if(isset($_POST['change'])){
  $id = $res['id'];
  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $password2 = $_POST['password2'];
$admin = "SELECT password FROM user WHERE password = '$old_password'";
$result1 = mysqli_query($connect,$admin);
$user1 = "SELECT password FROM user WHERE password = '$new_password'";
$result2 = mysqli_query($connect,$user1);
//$admin1 = "SELECT password FROM user WHERE password = '$new_password'";
//$result2 = mysqli_query($connect,$admin1);  
$count = mysqli_num_rows($result2);
//$count1 = mysqli_num_rows($result2);
if($count != 0){
  echo"<script>alert('Sorry!! Password Exist');window.location.href=('#?Password Exist');</script>";
}
//else if($count1 != 0){
  //echo"<script>alert('Password Exist');window.location.href=('#');</script>";
//}
else if($new_password != $password2){
  echo"<script>alert('Retype Incorrect');window.location.href=('#?Retype Incorrect');</script>";
}
else if($old_password != $res['password']){
  echo"<script>alert('Your old password is wrong');window.location.href=('#?Old Password Wrong');</script>";
}
else{
  ($new_password == $password2);
  $update = mysqli_query($connect,"UPDATE user SET password = '$new_password' WHERE  id = '$id'");
  echo"<script>alert('Successfully Password Change');window.location.href=('#');</script>";
}
}
echo "
<div id='profile_box'>
<div class='profile_header'>
<a href='admin_edit_info.php?id=$id'><label><span class='fa fa-edit'></span> Edit Profile</label></a>
<label><span class='fa fa-mail-forward'></span> Change Password</label>
</div>
<form method='POST'>
<div class='change_info'>
<p>To change your current password, please enter it below. Then type your new password in the appropriate box. Next time you login, you'll be able to use your new password</p>
</div>
<div class='change_input'>
<div>
  <input type='password' name='old_password' placeholder='Enter Old Password' required=''>
</div>
<div>
 <input type='password' id='password' name='new_password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' placeholder='Enter New Password' required=''>
</div>
<div>
  <input type='password' name='password2' placeholder='Re-type Password' required=''>
</div>
<div>
  <button type='submit' name='change'>Save Password <span class='fa fa-save' aria-hidden='true'></span></button>
</div>
</div>
</form>
<div class='change_input2'>
<p>Password should include atleast 4 types of characters out of the following 4:</p>
<div>
<ul>
  <li id='capital' class='invalid'>Uppercase characters A-Z</li>
  <li id='letter' class='invalid'>Lowercase characters a-z</li>
  <li id='number' class='invalid'>A Number</li>
  <li id='length' class='invalid'>Minimun 8 characters</li>
</ul>
</div>
</div>
</div>
<script src='../js/password_pattern.js'></script>
";?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>