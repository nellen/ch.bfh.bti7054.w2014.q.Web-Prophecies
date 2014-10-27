<?php
require './includes/langController.php';

$lang = get_language ();
include_once ("./includes/items.php");
$items = getCategoryItems ( 1, $lang );
foreach ( $items as $item ) {
	echo "<div class=\"list-article\">";
	echo "<img src=\"" . $item ["image"] . "\" width=\"100px\" height=\"100px\"/>";
	echo "<h2><a href=\"./croissant.html\">" . $item ["name"] . "</a></h2>";
	echo "<p class=\"list-article-price\">$priceLabel: " . $item ["price"] . " CHF</p>";
	echo "<p class=\"list-article-variation\">$variationsLabel:";
	$firstElement = TRUE;
	foreach ( $item ["variants"] as $variant ) {
		if ($firstElement) {
			$firstElement = FALSE;
		} else {
			echo ",";
		}
		echo " " . $variant ["variantname"] . " + " . $variant ["price"] . " CHF";
	}
	
	echo "</p>";
	echo "<p>" . $item ["discription"] . "</p>";
	echo "<button onclick=\"msgAddtoBasket()\">$basketButtonLabel</button>";
	echo "</div>";
}
?>
					