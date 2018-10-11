<?php 

if(!empty($_POST['ime'])){
	$ime = $_POST['ime'];
	$mail = $_POST['mail'];
	$to = 'dva.arh@gmail.com';
	$poruka = $_POST['poruka'];
	$text = 'Ime : '.$ime.', vam šalje poruku. Email : '.$mail. '. Poruka : '.$poruka;
	$headers = 'From: Server <dva.arh@gmail.com>' . PHP_EOL . 'Reply-To: Server <dva.arh@gmail.com>' . PHP_EOL .'X-Mailer: PHP/' . phpversion();
    mail($to, $name, $text, $headers );
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>KONTAKT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="../icons/icone.ico"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/mainindex.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/kontakt.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/app.js"></script>
</head>
<body onload="hideLoading();">
	<?php require 'menu.php'; ?>
	<div id="loadingbar">
		<img src="../images/loading.gif">
	</div>
	<form method="post">
		<div id="forma">
			<div class="name">
				<p>IME :</p>
			</div>
			<div class="formPart">
				<input type="text" name="ime" autocomplete="off">
			</div>
			<div class="name">
				<p>EMAIL :</p>
			</div>
			<div class="formPart">
				<input type="text" name="mail" autocomplete="off">
			</div>
			<div class="name">
				<p>PITANJE / KOMENTAR :</p>
			</div>
			<div class="formPart textarea">
				<textarea name="poruka" autocomplete="off"></textarea>
			</div>
			<div class="name"></div>
			<div class="formPart">
				<input id="send" type="submit" value="POŠALJI">
			</div>
			<div id="contactDetails">
				<div class="details">
					<h4 id="info">info@dva.ba</h4>
					<h4 id="arh">dva.arh@gmail.com</h4>
				</div>
				<div class="details details2">
					<h4>+387 61 670 025</h4>
				</div>
				<div class="details details3">
					<h4>+387 61 317 642</h4>
				</div>
			</div>
			<?php require 'icons.php'; ?>
		</div>
	</form>
</body>
</html>