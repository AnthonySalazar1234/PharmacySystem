<?php $title="ADMIN"; include"side_nav.php";
echo "
<div id='profile_box'>
<div class='profile_header'>
<a href='account.php'><label>Profile</label></a>
<label>Change Password</label>
</div>
<form method='POST'>
<div class='change_info'>
<p>To change your current password, please enter it below. Then type your new password in the appropriate box. Next time you login, you'll be able to use your new password</p>
</div>
<div class='change_input'>
<div>
  <input type='password' name='' placeholder='Enter Old Password' required=''>
</div>
<div>
 <input type='password' id='password' name='new_password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' placeholder='Enter New Password' required=''>
</div>
<div>
  <input type='password' name='' placeholder='Re-type Password' required=''>
</div>
<div>
  <button type='submit' name=''>Change Password</button>
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