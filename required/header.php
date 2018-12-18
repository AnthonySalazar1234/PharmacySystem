<!DOCTYPE html>
<html>
<head>
	<title>R&S PHARMACY -<?php echo $title;
   session_start(); 
   error_reporting(1);
   extract($_SESSION);
   extract($_GET);
  if(empty($firstname&&$lastname)){
  header("Location: ../index.php");
  }
  ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="shortcut icon" href="/image/cart.png">
	<link rel="stylesheet" type="text/css" href="/css/admin431.css">
 <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="/js/clock.js"></script>
  <script src="/js/print_reports.js"></script>
  <script src="/js/disablebackarrow.js"></script>
   <script src="/js/receipt.js"></script>
</head>
<body>
<input type="checkbox" id="menuToggle"></input>
<label for="menuToggle" class="menu-icon"><img src="../image/menu1.png"></label>
<div id="header">
	<div class="dropdown">
 <button class="dropbtn">Welcome: <span class="fa fa-user-md" aria-hidden="true"></span> <?php echo $username ?> <span class="fa fa-toggle-down" aria-hidden="true"></span></button>
  <div class="dropdown-content">
  	<div class="profile_imgbox">
      <?php 
      require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
      $sql = "SELECT * FROM user WHERE id = '$id'";
      $result = $connect->query($sql);
      $res = $result->fetch_assoc();
      echo "<img src='/upload/$res[name]';>"?>
  	</div>
  	<p><?php echo $firstname."&nbsp".$lastname?></p>
  	<a href="account.php"> My Account <span class="fa fa-user" aria-hidden="true"></span></a>
    <a href="/php/logout.php" onclick = "return confirm('Are you sure you want to logout <?php echo $firstname ?>')">Log Out <span class="fa fa-sign-out" aria-hidden="true"></a>
</div>
</div>
</div>