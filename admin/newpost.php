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
	<link rel="stylesheet" type="text/css" href="css/new.css">
	<script type="text/javascript" src="js/upload.js"></script>
</head>
<body>
	<?php require 'menu.php'; ?>
	<div id="section">
		<div id="sectionHeader">
			<h4>NOVI POST</h4>
		</div>
		<div id="itemdescription">
			<input type="text" id="header" placeholder="naslov">
			<select id="mySelect">
				<option id="des">DIZAJN</option>
				<option id="arh">ARHITEKTURA</option>
				<option id="vis">VIZUALIZACIJA</option>
			</select>
			<input type="text" id="video" name="" placeholder="video">
		</div>
		<div id="icon">
			<form enctype="multipart/form-data">
                <label for="file">
                	<img src="icons/editImage.png" title="Promijenite sliku profila">
                </label>
                <input type="file" class="hiddenElements" id="file" name="file">
               	<div onclick="uploadPicture();" id="iconUpload">UPLOAD ICON</div>
            </form>
            <div id="icona">
            	<img id="iconName" src="">
            </div>
		</div>
		<div class="forme">
			<textarea id="bos" placeholder="BOSANSKI"></textarea>
			<textarea id="eng" placeholder="ENGLESKI"></textarea>
			<textarea id="njem" placeholder="NJEMAČKI"></textarea>	
        </div>
        <div class="sveSlike">
        	<form enctype="multipart/form-data">
                <label for="file">
                	<img src="icons/editImage.png" title="Promijenite sliku profila">
                </label>
                <input type="file" class="hiddenElements" id="file" name="file" style="display: none;">
               	<div onclick="uploadAllPictures();" id="imagesUpload">UPLOAD ICON</div>
            </form>
            <div id="slikeeeee">
            </div>
            <div id="submitButton" onclick="savePost();">
            	SPREMITE
            </div>
        </div>
	</div>
</body>
</html>