<?php 
require '../class/db.php';
header('Content-Type: text/html; charset=UTF-8');
$id = Input::get('id');
$db = new DB();
$dbQuery = $db->query("produkt");
$iconQuery = $db->query("icon");
$photoQuery = $db->query("photos");

?>

<!DOCTYPE html>
<html>
<head>
	<title>NASLOV PROJEKTA :D</title>
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
<body onload="init();">
	<?php require 'menu.php'; ?>
	<div id="mainWrapper">
		<?php 
		while($item = $dbQuery -> fetch()){
			if($item['id'] == $id){ ?>
				<div class="subwrapper subwrapper1">
					<?php 
					while($icon = $iconQuery -> fetch()){
						if($icon['idofpost'] == $item['id']){ ?>
							<div class="leftside">
								<img src="../admin/icons/<?php echo $icon['name']; ?>">
							</div>
						<?php }
					}
					?>
					<div class="leftside leftside1">
						<p>
							<?php echo $item['bos']; ?>							
						</p>
					</div>
				</div>
				<div class="subwrapper subwrapper2">
					<?php 
						$i = 1;
						while($photo = $photoQuery -> fetch()){
							if($photo['idofpost'] == $item['id']){ 
								$i++;
							}
						}
						$i--;
					?>
					<p id="numOfImages" style="display: none;"><?php echo $i; ?></p>
					<?php 
					$photoQuery = $db->DESCquery("photos");
					while($photo = $photoQuery -> fetch()){
						if($photo['idofpost'] == $item['id']){ ?>
							<img class="sliderImages" id="<?php echo $i--; ?>" src="../admin/photos/<?php echo $photo['name']; ?>">		
						<?php }
					}
					?>
					<div class="arrows" onclick="showPrevious();">
						<div class="arrowRL">
							<img src="../icons/arrowLeft.png">
						</div>
					</div>
					<div class="arrows arrows2" onclick="showNext();">
						<div class="arrowRL">
							<img src="../icons/arrowRight.png">
						</div>
					</div>
				</div>
			<?php }
		}
		?>
		
		<?php require 'icons.php'; ?>
	</div>
</body>
</html>