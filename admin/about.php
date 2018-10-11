<?php 
require '../class/db.php';
require '../class/user.php';

if(!Session::getUsername()){
	Redirect::to('../index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
		<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/about.css">
</head>
<body>
	<?php require 'menu.php'; ?>
	<div id="section">
		<h1>O NAMA</h1>
	</div>
	<form style="display: block;">
		<input type="text" name="" style="background: red; position: fixed; left: 300px;">
	</form>
</body>
</html>