<?php

			$lang = get_language ();
			include_once ("./includes/items.php");
			$items = getCategoryItems ( 1, $lang );
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
?>
					