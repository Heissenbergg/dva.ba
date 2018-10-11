<?php 
require '../class/db.php';
require '../class/user.php';

if(!Session::getUsername()){
	Redirect::to('../index.php');
}
$id = Input::get('id');
$db = new DB();
$prodQuery = $db->query("produkt");
?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/new.css">
	<script type="text/javascript" src="js/upload.js"></script>
</head>
<body onload="setElements();">
	<?php require 'menu.php'; ?>
	<div id="section">
		<?php 
		while($product = $prodQuery -> fetch()){
			if($product['id'] == $id){ ?>
				<div id="sectionHeader">
					<h4>NOVI POST</h4>
				</div>
				<div id="itemdescription">
					<input type="text" id="header" value="<?php echo $product['header']; ?>" placeholder="naslov">
					<select id="mySelect">
						<option><?php echo $product['category']; ?></option>
						<option id="des">DIZAJN</option>
						<option id="arh">ARHITEKTURA</option>
						<option id="vis">VIZUALIZACIJA</option>
					</select>
					<input type="text" id="video" name="" placeholder="video">
				</div>
				<div id="icon">
					<form enctype="multipart/form-data">
		                <label for="file">
		                	<img src="icons/editImage.png" title="Ikona">
		                </label>
		                <input type="file" class="hiddenElements" id="file" name="file">
		               	<div onclick="uploadPicture();" id="iconUpload">UPLOAD ICON</div>
		            </form>
		            <div id="icona">
		            	<?php 
		            	$iconQuery = $db->query("icon");
		            	while($icon = $iconQuery -> fetch()){
							if($icon['idofpost'] == $product['id']){ 
								$iconName = $icon['name'];
								?>
								<img id="iconName" src="icons/<?php echo $iconName; ?>">
							<?php }		            		
		            	}
		            	?>
		            </div>
				</div>
				<div class="forme">
					<textarea id="bos" placeholder="BOSANSKI"><?php echo $product['bos']; ?></textarea>
					<textarea id="eng" placeholder="ENGLESKI"><?php echo $product['eng']; ?></textarea>
					<textarea id="njem" placeholder="NJEMAČKI"><?php echo $product['njem']; ?></textarea>	
		        </div>
		        <div class="sveSlike">
		        	<form enctype="multipart/form-data">
		                <label for="file">
		                	<img src="icons/editImage.png" title="PHOTOS">
		                </label>
		                <input type="file" class="hiddenElements" id="file" name="file" style="display: none;">
		               	<div onclick="uploadAllPictures();" id="imagesUpload">UPLOAD PHOTOS</div>
		            </form>
		            <div id="slikeeeee">
		            <?php 
		            $photos = array();
		            $i = 0;
		            $photoQuery = $db->query("photos");
		            while($photo = $photoQuery -> fetch()){
		            	if($photo['idofpost'] == $product['id']){ 
		            		array_push($photos, $photo['name']);
		            		?>
		            		<div class="slika" id="<?php echo $i; ?>">
		            			<img src="photos/<?php echo $photo['name'] ?>">
		            			<div class="deletebutton" onclick="deleteImage(<?php echo $i++; ?>);">
		            				X
		            			</div>
		            		</div>
		            	<?php }
		            }
		            ?>
		            </div>
		            <div id="submitButton" onclick="savePost(postid);">
		            	SPREMITE
		            </div>
		        </div>
			<?php }
		}
		?>
	</div>

	<script type="text/javascript">
		iconName = <?=json_encode($iconName)?>;
		var postid = <?=json_encode($id)?>;
		<?php
			$js_array = json_encode($photos);
			echo "var photos = ". $js_array . ";\n";
		?>
	</script>
</body>
</html>