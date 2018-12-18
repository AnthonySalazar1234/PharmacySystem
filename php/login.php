<?php
require"connect.php";
session_start();
$usernameErr = $passwordErr = $username = $password =  $passwordinvalidErr = $usernameinvalidErr = ''; 
if(isset($_POST['login'])){
$validate = true;
if(empty($_POST['username'])){
$validate = false;
$usernameinvalidErr = 'Please Enter Username';
$usernameErr = 'error';
}
else{
$username = mysqli_real_escape_string($connect,$_POST['username']);
}
if(empty($_POST['password'])){
$validate = false;
$passwordinvalidErr = 'Please Enter Username';
$passwordErr = 'error';
}
else{
$password = mysqli_real_escape_string($connect,$_POST['password']);
}
$sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
$result = $connect->query($sql);
$count = $result->num_rows;
$res = $result->fetch_assoc();
if($count > 0){
    switch($res['user_type']){
        case "user":
    $_SESSION['id'] = $res['id'];
    $_SESSION['user_type'] = $res['user_type'];
    $_SESSION['firstname'] = $res['firstname'];
    $_SESSION['lastname'] = $res['lastname'];
    $_SESSION['birthdate'] = $res['birthdate'];
    $_SESSION['age'] = $res['age'];
    $_SESSION['gender'] = $res['gender'];
    $_SESSION['address'] = $res['address'];
    $_SESSION['contact'] = $res['contact'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['name'] = $res['name'];
    header("Location:user/pos.php");
    break;
    
        case "admin";
        
    $_SESSION['id'] = $res['id'];
    $_SESSION['user_type'] = $res['user_type'];
    $_SESSION['firstname'] = $res['firstname'];
    $_SESSION['lastname'] = $res['lastname'];
    $_SESSION['birthdate'] = $res['birthdate'];
    $_SESSION['age'] = $res['age'];
    $_SESSION['gender'] = $res['gender'];
    $_SESSION['address'] = $res['address'];
    $_SESSION['contact'] = $res['contact'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['name'] = $res['name'];
     header("Location:admin/admin_index.php");

    }
}
else {
     $invalidErr = 'Email or Password is incorrect.';
}
}
?>