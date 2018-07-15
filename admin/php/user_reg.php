<?php require"../../php/connect.php";
if(isset($_POST['reg']))
{
	$name = $_FILES['file']['name'];
  	$temp = $_FILES['file']['tmp_name'];
  	$type = $_FILES['file']['type'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$month = $_POST['month'];
	$date = $_POST['date'];
	$year = $_POST['year'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$user_type = $_POST['user_type'];
	$birthdate = $_POST['month']."/".$_POST['date']."/".$_POST['year'];

	$sql = "SELECT * FROM user WHERE firstname = '$firstname' AND lastname = '$lastname'";
	$result = $connect->query($sql);
	$count =  $result->num_rows;
	$sql1 ="SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result1 = $connect->query($sql1);
	$count1 =  $result1->num_rows;
if($count !=0){
	echo "<script>alert('Sorry User Exist');window.location.href=('../../admin/user.php');</script>";
}
else if($count1 !=0){
	echo "<script>alert('Sorry Username or Password Exist');window.location.href=('../../admin/user.php');</script>";
}
else if ((strtolower($type) != "image/jpg") && (strtolower($type) != "image/jpeg") && (strtolower($type) != "image/png") && (strtolower($type) != "image/gif")){
   echo "<script>alert('Error Uploading Image');window.location.href=('../../admin/user.php');</script>";
}
else{
move_uploaded_file($temp,"../../upload/".$name);
$insert = $connect->prepare("INSERT INTO user(firstname,lastname,birthdate,age,gender,address,contact,user_type,name,type)VALUES('$firstname','$lastname','$birthdate','$age','$gender','$address','$contact','$user_type','$name','$type')");
$insert->execute();
	echo "<script>alert('Successfull New User Added');window.location.href=('../../admin/user.php');</script>";
}
}

?>