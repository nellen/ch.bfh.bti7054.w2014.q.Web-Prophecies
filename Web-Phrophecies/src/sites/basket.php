<?php

include_once ("./includes/items.php");
$lang = get_language ();

if (isset($_POST['artId']) && isset($_POST['varId'])){

	if (!isset($_SESSION['basket'])){
		$_SESSION['basket'] = new basket();
	}

	$_SESSION['basket']->addItem($_POST['artId'], $_POST['varId']);
}

if (!isset($_SESSION['basket'])){
	echo "Shopping basket is empty";
}
else{
	
	if(isset($_POST['recordKey'])){
		$_SESSION['basket']->removeItem($_POST['recordKey'], $_POST['newQuantity']);
	}
	$_SESSION['basket']->display($lang);
 	
}


?>