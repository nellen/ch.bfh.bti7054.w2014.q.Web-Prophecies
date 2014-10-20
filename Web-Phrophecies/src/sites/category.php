<?php 
					
					include_once("./includes/items.php");
					foreach ($items as $item) {
						echo "<div class=\"list-article\">";
						echo "<img src=\"".$item["image"]."\" width=\"100px\" height=\"100px\"/>";
						echo "<h2><a href=\"./croissant.html\">".$item["name"]."</a></h2>";
						echo "<p class=\"list-article-price\">Price: ".$item["price"]." CHF</p>";
						echo "<p class=\"list-article-variation\">Variations:";
						$firstElement = TRUE;
						foreach ( $item["variants"] as $variant){
							if ($firstElement) {
								$firstElement = FALSE;
							}
							else {
								echo ",";
							}
							echo " ".$variant["variantname"]." + ".$variant["price"]." CHF";
						}

						echo "</p>";
						echo "<p>".$item["discription"]."</p>";
						echo "<button onclick=\"msgAddtoBasket()\">Add to basket</button>";
						echo "</div>";
					}
					?>
					