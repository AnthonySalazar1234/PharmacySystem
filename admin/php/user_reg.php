<?php  require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
if(isset($_POST['reg']))
{
	$name = $_FILES['file']['name'];
  	$temp = $_FILES['file']['tmp_name'];
  	$type = $_FILES['file']['type'];
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$month = mysql_real_escape_string($_POST['month']);
	$date = mysql_real_escape_string($_POST['date']);
	$year = mysql_real_escape_string($_POST['year']);
	$age = mysql_real_escape_string($_POST['age']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$address = mysql_real_escape_string($_POST['address']);
	$contact = mysql_real_escape_string($_POST['contact']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$user_type = mysql_real_escape_string($_POST['user_type']);
	$birthdate = mysql_real_escape_string($_POST['month']."/".$_POST['date']."/".$_POST['year']);

	$fetch_user = "SELECT * FROM user WHERE user_type = 'user'";
	$result = $connect->query($fetch_user);
	$res = $result->fetch_assoc();
	$sql = "SELECT * FROM user WHERE firstname = '$firstname' AND lastname = '$lastname'";
	$result = $connect->query($sql);
	$count =  $result->num_rows;
	$sql1 ="SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result1 = $connect->query($sql1);
	$count1 =  $result1->num_rows;
if($count !=0){
	echo "<script>alert('Sorry User Exist');window.location.href=('/admin/user.php');</script>";
}
else if($count1 !=0){
	echo "<script>alert('Sorry Username or Password Exist');window.location.href=('/admin/user.php');</script>";
}
else if ((strtolower($type) != "image/jpg") && (strtolower($type) != "image/jpeg") && (strtolower($type) != "image/png") && (strtolower($type) != "image/gif")){
   echo "<script>alert('Error Uploading Image');window.location.href=('/admin/user.php');</script>";
}
else{
move_uploaded_file($temp,"/R&S/upload/".$name);
$insert = $connect->prepare("INSERT INTO user(firstname,lastname,birthdate,age,gender,address,contact,username,password,user_type,name,type)VALUES('$firstname','$lastname','$birthdate','$age','$gender','$address','$contact','$username','$password','$user_type','$name','$type')");
$insert->execute();
	echo "<script>alert('Successfull New User Added');window.location.href=('/admin/user.php?user=$res[user_type]');</script>";
}
}

?>