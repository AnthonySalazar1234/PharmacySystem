<!DOCTYPE html>
<html>
<head>
	<title>R&S PHARMACY - Login Account></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	 <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style_log38.css">
	<link rel="shortcut icon" href="image/cart.png">
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
<?php require($_SERVER['DOCUMENT_ROOT'].'/php/login.php');?>
<div id="login_box">
<div class="login_header">
<label>R&S PHARMACY</label>
<span class="fa fa-gear" aria-hidden="true"></span>
</div>
<div class="user">
<img src="image/med_icon1.png" style="opacity: 0.9">
</div>
<div class="input">
<div>
<span class="fa fa-user" aria-hidden="true"></span>
<input type="text" name="username" placeholder="Enter Username">
</div>
<div>
<span class="fa fa-lock" aria-hidden="true"></span>
<input type="password" name="password" placeholder="Enter Password">
</div>
<div class="login_btn">
<button type="submit" name="login">Login Account <span class="fa fa-sign-in" aria-hidden="true"></span></button>
</div>
</div>
</div>
<div>
	<p>R&S PHARMACY POS &copy <?php echo date('Y'); ?> | Design By: Anthony Salazar</p>
</div>
</form>
</body>
</html>