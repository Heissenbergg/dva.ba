<?php

require '../../class/db.php';

$db = new DB();

$header = $_POST['header'];
$category = $_POST['category'];
$bos = $_POST['bos'];
$eng = $_POST['eng'];
$njem = $_POST['njem'];
$iconName = $_POST['iconName'];
$video = $_POST['video'];
$idofpost = $_POST['idofpost'];
//$photos = json_decode(stripslashes($_POST['photos']));

$update = "UPDATE `produkt` SET 
		  `header` = '{$header}',
		  `category` = '{$category}',
		  `bos` = '{$bos}',
		  `eng` = '{$eng}',
		  `njem` = '{$njem}',
		  `video` = '{$video}'
		  WHERE id = $idofpost";

if($db->action($update)){
	echo "done"; 
}else echo "notdone";

$delete = "DELETE FROM `photos` WHERE idofpost = $idofpost";
$db->action($delete);

$id = $idofpost;

$photos = explode(",", $_POST['photos']);
foreach($photos as $photo){
	$db->action("INSERT INTO `photos` (`name`,`idofpost`) VALUES ('{$photo}', '{$id}' )" );
}


$db->action("UPDATE `icon` SET `name` = '{$iconName}' WHERE idofpost = $idofpost");
