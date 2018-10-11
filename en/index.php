<?php 
	require '../class/db.php';
	$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
	<title>DVA</title>
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="../icons/icone.ico"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/mainindex.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/app.js"></script>
</head>
<body onload="setLogo();">
	<?php require 'menu.php'; ?>
	<div id="loadingbar">
		<img src="../images/loading.gif">
	</div>
	<img id="logo" src="../icons/layer.png">
	<div id="languagePart">
		<div class="language">
			<h4>
				<a onclick="showDesignIcons();" href="#">DESIGN</a>
			</h4>
		</div>
		<div class="language language2">
			<h4>
				<a onclick="showVisualisationIcons();" href="#">VISUALISATION</a>
			</h4>
		</div>
		<div class="language language3">
			<h4>
				<a onclick="showArhitectureicons();" href="#">ARHITECTURE</a>
			</h4>
		</div>
	</div>
	<div id="dizajIcons">
		<?php 
		$dbQuery = $db->query("produkt");
		while($design = $dbQuery -> fetch()){
			if($design['category'] == "DIZAJN"){
				$iconQuery = $db->query("icon");
				while($icon = $iconQuery -> fetch()){
					if($icon['idofpost'] == $design['id']){ ?>
						<div class="dizajIcon">
							<a href="produkti.php?id=<?php echo $design['id']; ?>">
								<img src="../admin/icons/<?php echo $icon['name']; ?>">
							</a>
						</div>				
					<?php }
				}
			}
		}
		?>
	</div>
	<div id="visualIcons">
		<?php 
		$dbQuery = $db->query("produkt");
		while($design = $dbQuery -> fetch()){
			if($design['category'] == "VIZUALIZACIJA"){
				$iconQuery = $db->query("icon");
				while($icon = $iconQuery -> fetch()){
					if($icon['idofpost'] == $design['id']){ ?>
						<div class="dizajIcon">
							<a href="produkti.php?id=<?php echo $design['id']; ?>">
								<img src="../admin/icons/<?php echo $icon['name']; ?>">
							</a>
						</div>				
					<?php }
				}
			}
		}
		?>
	</div>
	<div id="arhIcons">
		<?php 
		$dbQuery = $db->query("produkt");
		while($design = $dbQuery -> fetch()){
			if($design['category'] == "ARHITEKTURA"){
				$iconQuery = $db->query("icon");
				while($icon = $iconQuery -> fetch()){
					if($icon['idofpost'] == $design['id']){ ?>
						<div class="dizajIcon">
							<a href="produkti.php?id=<?php echo $design['id']; ?>">
								<img src="../admin/icons/<?php echo $icon['name']; ?>">
							</a>
						</div>				
					<?php }
				}
			}
		}
		?>
	</div>
	<?php require 'icons.php'; ?>
</body>
</html>