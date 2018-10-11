<?php 
require '../class/db.php';
require '../class/user.php';

if(!Session::getUsername()){
	Redirect::to('../index.php');
}
$db = new DB();
if(!empty($_POST['bos'])){
	$bos = $_POST['bos'];
	$bos = addslashes($bos);
	$en = $_POST['en'];
	$en = addslashes ($en);
	$de = $_POST['de'];
	$de = addslashes ($de);
	$update = "UPDATE `about` SET `bos` = '{$bos}', `en` = '{$en}', `de` = '{$de}' WHERE id = 1";
	$db->action($update);
	Redirect::to('onama.php');
}

$dbquery = $db->query("about");
?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/onama.css">
</head>
<body>
	<?php require 'menu.php'; ?>
	<div id="sekcija">
		<h1>O NAMA</h1>
		 <form method="post">
		 	<?php 
		 	while($meh = $dbquery -> fetch()){ ?>
		 		<textarea name="bos"><?php echo $meh['bos']; ?></textarea>
			 	<textarea name="en"><?php echo $meh['en']; ?></textarea>
			 	<textarea name="de"><?php echo $meh['de']; ?></textarea><br><br>
		 	<?php }
		 	?>
		 	
		 	<input type="submit" name="" value="SPREMI">
		 </form>
	</div>
</body>
</html>