<!DOCTYPE html>
<html>
<head>
	<title>R&S PHARMACY -<?php echo $title;
   session_start(); 
   error_reporting(1);
   extract($_SESSION);
   extract($_GET);
if(empty($_SESSION['firstname']&&$_SESSION['username'])){
  header("Location: ../index.php");
}
  ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
   <link rel="shortcut icon" href="../image/cart.jpg">
	<link rel="stylesheet" type="text/css" href="../css/admin29.css">
  <script src="../js/clock.js"></script>
  <script src="../js/print_reports.js"></script>
  <script src="../js/disablebackarrow.js"></script>
</head>
<body>
<input type="checkbox" id="menuToggle">
<label for="menuToggle" class="menu-icon"><img src="../image/menu1.png"></label>
<div id="header">
	<div class="dropdown">
 <button class="dropbtn">Welcome: <?php echo $username ?> &#9660;</button>
  <div class="dropdown-content">
  	<div class="profile_imgbox">
  		<img src="../upload/<?php echo $name ?>">
  	</div>
  	<p><?php echo $firstname."&nbsp".$lastname?></p>
  	<a href="account.php">My Account</a>
    <a href="../php/logout.php" onclick = "return confirm('Are you sure you want to logout <?php echo $firstname ?>')">Log Out</a>
</div>
</div>
</div>