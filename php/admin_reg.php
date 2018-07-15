<?php
 require"connect.php";
 if(isset($_POST['register'])){ 

$name = $_FILES['file']['name'];
$temp = $_FILES['file']['tmp_name'];
$type = $_FILES['file']['type'];
$fullname = $_POST['fullname'];
$birthdate = $_POST['birthdate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];
$admin_id = date('mdyis');

$select = mysqli_query($connect,"SELECT fullname FROM admin WHERE fullname ='$fullname'");
$select1 = mysqli_query($connect,"SELECT username FROM admin WHERE  username = '$username'");
$select2 = mysqli_query($connect,"SELECT password FROM admin WHERE password = '$password'");
$select3 = mysqli_query($connect,"SELECT username,password FROM admin WHERE password = '$password' OR username = '$username'");

$count =  mysqli_num_rows($select);
$count1 = mysqli_num_rows($select1);
$count2 = mysqli_num_rows($select2);
$count3 = mysqli_num_rows($select3);

if($count !=0){
	echo "<script>alert('Sorry Name Exist');window.location.href=('../user/admin.php');</script>";
}
else if($count1 !=0){
	echo "<script>alert('Sorry Username Exist');window.location.href=('../user/admin.php');</script>";
}
else if($count2 !=0){
	echo "<script>alert('Sorry Username Exist');window.location.href=('../user/admin.php');</script>";
}
else if($count3 !=0){
	echo "<script>alert('Sorry Username or Password Exist');window.location.href=('../user/admin.php');</script>";
}
else if ((strtolower($type) != "image/jpg") && (strtolower($type) != "image/jpeg") && (strtolower($type) != "image/png")){
   echo "<script>alert('Image must be jpg,jpeg,png extension');window.location.href=('../user/admin.php');</script>";
}
else{
move_uploaded_file($temp, "../upload/" .$name);
$insert = "INSERT INTO admin(admin_id,name,fullname,birthdate,age,gender,address,contact,username,password)VALUES('$admin_id','$name','$fullname','$birthdate','$age','$gender','$address','$contact','$username','$password')";
$result = mysqli_query($connect,$insert);
	echo "<script>alert('Successfull New Admin Created');window.location.href=('../user/admin.php');</script>";
}
}
?>
