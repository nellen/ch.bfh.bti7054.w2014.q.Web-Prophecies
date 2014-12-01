<?php
	if (isset ( $_GET ["category"] )) {
		echo ($_GET ["category"]);
			$lang = get_language ();
			include_once ("./includes/items.php");
			$items = getCategoryItems ( $_GET ["category"], $lang );
			foreach ( $items as $item ) {
				echo "<div class=\"list-article\">";
				echo "<img src=\"" . $item->getImage() . "\" width=\"100px\" height=\"100px\"/>";
				echo "<h2><a href=\"./croissant.html\">" . $item->getName() . "</a></h2>";
				echo "<p class=\"list-article-price\">$priceLabel: " . $item->getPrice() . " CHF</p>";
				echo "<p class=\"list-article-variation\">$variationsLabel:";
				$firstElement = TRUE;
				foreach ( $item ->getVariants() as $variant ) {
					if ($firstElement) {
						$firstElement = FALSE;
					} else {
						echo ",";
					}
					echo " " . $variant->getName() . " + " . $variant->getPrice() . " CHF";
				}
				
				echo "</p>";
				echo "<p>" . $item->getDescription() . "</p>";
				echo "<form action=\"index.php\" method=\"get\">";
				echo "<input type=\"hidden\" name=\"site\" value=\"article\" /input>";
				echo "<input type=\"hidden\" name=\"lang\" value=\"". $lang. "\" /input>";
				echo "<input type=\"hidden\" name=\"artId\" value=\"". $item->getId(). "\" /input>";
				echo "<input class=\"list-article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
				echo "</form>";
				echo "</div>";
			}
	} else {
		echo "Shop";
		echo "<img src=\"./img/under_construction.png\" width=\"100%\" height=\"100%\" />";
	}
	
?>