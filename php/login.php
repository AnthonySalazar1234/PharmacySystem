<?php
require"connect.php";
session_start();

if(isset($_POST['login'])){
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
    
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
    header("Location:../user/index.php");
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
     header("Location:../admin/admin_index.php");

    }
}
else {
    echo"<script>alert('Error Username or Password!');window.location.href=('../index.php');</script>";
}
}
?>