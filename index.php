<!DOCTYPE html>
<html>
<head>
	<title>R&S PHARMACY - Login Account></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/style_log.css">
	 <link rel="shortcut icon" href="image/cart.jpg">
</head>
<body>
<form method="POST" action="php/login.php">
<div id="login_box">
<div class="login_header">
<label>R&S PHARMACY</label>
</div>
<div class="user">
<img src="image/main.png">
</div>
<div class="input">
<div>
<input type="text" name="username" placeholder="Enter Username" required="">
</div>
<div>
<input type="password" name="password" placeholder="Enter Password" required="">
</div>
<div>
<button type="submit" name="login">Login Account</button>
</div>
</div>
</div>
</form>
</body>
</html>