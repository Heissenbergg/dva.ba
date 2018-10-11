<?php 
require 'class/db.php';
$date = new Date(date("d"),date("m"), date("y"));
?>
<!DOCTYPE html>
<html>
<head>
	<title>DVA</title>
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="icons/icone.ico"/>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/app.js"></script>
</head>
<body onload="setLogo();">
	<img id="logo" src="icons/layer.png">
	<div id="loadingbar">
		<img src="images/loading.gif">
	</div>
	<div id="languagePart">
		<div class="language">
			<h4>
				<a href="bos/">BOSANSKI</a>
			</h4>
		</div>
		<div class="language language2">
			<h4>
				<a href="en/">ENGLISH</a>
			</h4>
		</div>
		<div class="language language3">
			<h4>
				<a href="de/">DEUTSCH</a>
			</h4>
		</div>
	</div>

	<div id="socialIcons">
		<div class="image">
			<a target="_blank" href=""><img src="icons/FACEBOOK.png"></a>
		</div>
		<div class="image image2">
			<a target="_blank" href=""><img src="icons/INSTAGRAM.png"></a>
		</div>
		<div class="image image3">
			<a target="_blank" href=""><img src="icons/PINTEREST.png"></a>
		</div>
	</div>
</body>
</html>