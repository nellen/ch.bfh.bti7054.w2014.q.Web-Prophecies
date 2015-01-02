<?php

	if (isset ( $_GET ["category"] )) {
		echo ($_GET ["category"]);
			$lang = get_language ();
			include_once ("./includes/items.php");
			$items = getCategoryItems ( $_GET ["category"], $lang );
			foreach ( $items as $item ) {
				echo $item->getListView($lang);
			}
	} else {
		$lang = get_language();
		echo "<form name=\"productSearch\">";
		echo $searchfor . ": <input type=\"text\" id=\"productKeyword\" onkeyup=\"getProductHint(this.value);\" />";
		echo "</form>";
		echo "<div id=\"searchResult\"></div>";
		
	}
	
?>