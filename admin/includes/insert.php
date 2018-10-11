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
//$photos = json_decode(stripslashes($_POST['photos']));

$insert = "INSERT INTO `produkt` (`header`,`category`,`bos`,`eng`,`njem`,`video`) 
		   VALUES ('{$header}', '{$category}', '{$bos}', '{$eng}', '{$njem}', '{$video}')";
$db->action($insert); 

$query = $db->query("produkt");
$id = 0;
while($row = $query -> fetch()){
	$id = $row['id'];
}

echo $id;

$photos = explode(",", $_POST['photos']);
foreach($photos as $photo){
	$db->action("INSERT INTO `photos` (`name`,`idofpost`) VALUES ('{$photo}', '{$id}' )" );
}

$db->action("INSERT INTO `icon` (`name`,`idofpost`) VALUES ('{$iconName}', '{$id}' )" );