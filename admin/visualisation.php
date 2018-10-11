<?php 
require '../class/db.php';
require '../class/user.php';

if(!Session::getUsername()){
	Redirect::to('../index.php');
}



$db = new DB();
$prodQuery = $db->query("produkt");
if(!empty($_POST['delete'])){
	$id = $_POST['delete'];
	$db->action("DELETE FROM `produkt` WHERE id = $id");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require 'menu.php'; ?>
	<div id="section">
		<div id="sectionHeader">
			<h4>VIZUALIZACIJA</h4>
		</div>
		<div id="allitems">
			<?php 
			while($product = $prodQuery -> fetch()){
				$iconQuery = $db->query("icon");
				$photoQuery = $db->query("photos"); 
				
				if($product['category'] == "VIZUALIZACIJA") { ?>
					<div class="specificItem">
						<?php 
						while($icon = $iconQuery -> fetch()){
							if($icon['idofpost'] == $product['id']){ ?>
								<div class="picture">
									 <img src="<?php echo "icons/".$icon['name']; ?>">
								</div>
							<?php }
						}
						?>
						<div class="name">
							<h4><?php echo $product['header']; ?></h4>
						</div>
						<div class="buttons">
							<div class="buttonEdit">
								<a href="edit.php?id=<?php echo $product['id']; ?>">UREDITE</a>
							</div>
							<div class="buttonEdit deleteButton">
								<form method="post">
									<input type="hidden" name="delete" value="<?php echo $product['id']; ?>">
									<input type="submit" value="OBRIŠITE">
								</form>
							</div>
						</div>
					</div>
			<?php } }
			?>
		</div>
	</div>
</body>
</html>