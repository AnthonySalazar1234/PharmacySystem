<?php  require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
$fetch_user = "SELECT * FROM user WHERE user_type = 'user'";
$result = $connect->query($fetch_user);
$res = $result->fetch_assoc();
$delete_user="DELETE FROM user WHERE id = '$id'";
if($connect->query($delete_user)==TRUE){
	echo "<script>alert('User Deleted');window.location.href=('/admin/user.php?user=$res[user_type]');</script>";
}
else{
	echo"Error to delete supplier";
}
?>