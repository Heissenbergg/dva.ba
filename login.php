<?php 
require 'class/db.php';
require 'class/user.php';


$user = new User();

if(!empty($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user->login($username, $password);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
 <div>
 	<form method="post">
 		<div id="loginHeader">
 			<h4>Prijavite se</h4>
 		</div>
 		<input class="inp" type="text" name="username" placeholder="username">
 		<input class="inp inp2" type="password" name="password" placeholder="password">
 		<input class="inp inp3" type="submit" name="">
 	</form>
 </div>
</body>
</html>