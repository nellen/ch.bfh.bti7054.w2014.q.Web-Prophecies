<?php
include_once("../../config.php");
include_once ROOT . "includes/items.php";
include_once ROOT . "includes/functions.php";
include_once ROOT . "includes/langController.php";

function __autoload($class_name) {
	require_once(ROOT . "includes/".$class_name.".inc.php");
}

$lang = get_language();

	if (isset($_GET["keyword"]) && ($_GET["keyword"] != "")){
		$items = getItemByKeyword($_GET["keyword"], $lang);
		if(count($items) > 0){
			foreach ($items as $item){
				echo $item->getSearchView();
			}
		} else {
			echo $prodSearchProductNotFound;
		}
	}
?>