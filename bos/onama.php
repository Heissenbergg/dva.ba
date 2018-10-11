<?php 
require '../class/db.php';
header('Content-Type: text/html; charset=UTF-8');
$id = Input::get('id');
$db = new DB();
$dbQuery = $db->query("about");

?>

<!DOCTYPE html>
<html>
<head>
	<title>NASLOV PROJEKTA :D</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="../icons/icone.ico"/>
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/mainindex.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/dizajn.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/app.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/slide.js"></script>
</head>
<body onload="hideLoadingbar();">
	<?php require 'menu.php'; ?>
	<div id="loadingbar">
		<img src="../images/loading.gif">
	</div>
	<div id="mainWrapper">
		<div class="subwrapper subwrapper1">
			<div class="leftside">
				<img src="../icons/logo.png">
			</div>
			<div class="leftside leftside1">
				<p>
					<?php 
						while($ab = $dbQuery -> fetch()){
							echo $ab['bos'];							
						}
					?>
				</p>
			</div>
		</div>
		<div class="subwrapper subwrapper2">
			<img class="sliderImages" src="../images/4.jpg?>">
		</div>
		
		<?php require 'icons.php'; ?>
	</div>
</body>
	<script type="text/javascript">
		function hideLoadingbar(){
			document.getElementById("loadingbar").style.display = 'none';
		}
	</script>
</html>

