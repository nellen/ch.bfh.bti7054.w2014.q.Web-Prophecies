<?php
function getCategoryItems ($CatId, $lang) {
	switch($lang) {
		case "en":
			$items = array();
			$items[] = new article(1,"Croissant", 1.50, "Homemade croissants. Freshly baked each morning.", "./img/user-a.png",
					 	array(
								new articleVariant(1, "butter", 0.00),
								new articleVariant(2, "whole-grain", 0.00)
							)
			);
			$items[] = new article(2, "Bun", 1.50, "Homemade buns. Freshly baked each morning.", "./img/user-b.png",
					array(
						new articleVariant(1, "butter", 0.00),
						new articleVariant(2, "whole-grain", 0.00),
						new articleVariant(3, "bacon", 0.50)
					)
			);
			$items[] = new article(3, "Bread", 2.00, "Homemade bread. Freshly baked each morning.", "./img/user-c.png",
					array(
						new articleVariant(1, "butter", 0.00),
						new articleVariant(2, "whole-grain", 0.00)
					)
			);

			break;
		case "de":
			
			$items = array();
			$items[] = new article(1,"Gipfeli", 1.50, "Hausgemachte Gipfeli.  Jeden Morgen frisch gebacken.", "./img/user-a.png",
					array(
							new articleVariant(1, "mit Butter", 0.00),
							new articleVariant(2, "Vollkorn", 0.00)
					)
			);
			$items[] = new article(2, "Brötchen", 1.50, "Hausgemachte Brötchen. Jeden Morgen frisch gebacken.", "./img/user-b.png",
					array(
							new articleVariant(1, "mit Butter", 0.00),
							new articleVariant(2, "Vollkorn", 0.00),
							new articleVariant(3, "Speck", 0.50)
					)
			);
			$items[] = new article(3, "Brot", 2.00, "Hausgemachtes Brot. Jeden Morgen frisch gebacken.", "./img/user-c.png",
					array(
							new articleVariant(1, "mit Butter", 0.00),
							new articleVariant(2, "Vollkorn", 0.00)
					)
			);

			break;
		case "fr":
			
			$items = array();
			$items[] = new article(1,"Croissant", 1.50, "discription fr", "./img/user-a.png",
					array(
							array("varId" => 1, "variantname" => "butter", "price" => 0.00),
							array("varId" => 2, "variantname" => "whole-grain", "price" => 0.00)
					)
			);
			$items[] = new article(2, "Bun", 1.50, "discription fr", "./img/user-b.png",
					array(
							array("varId" => 1, "variantname" => "butter", "price" => 0.00),
							array("varId" => 2, "variantname" => "whole-grain", "price" => 0.00),
							array("varId" => 3, "variantname" => "bacon", "price" => 0.50)
					)
			);
			$items[] = new article(3, "Bread", 2.00, "discription fr", "./img/user-c.png",
					array(
							array("varId" => 1, "variantname" => "butter", "price" => 0.00),
							array("varId" => 2, "variantname" => "whole-grain", "price" => 0.00)
					)
			);
			
			break;
		default:
			$items = array();
			$items[] = new article(1,"Croissant", 1.50, "Homemade croissants. Freshly baked each morning.", "./img/user-a.png",
					 		array(
							new articleVariant(1, "butter", 0.00),
							new articleVariant(2, "whole-grain", 0.00),
							
							)
						);
			$items[] = new article(2, "Bun", 1.50, "Homemade buns. Freshly baked each morning.", "./img/user-b.png",
					array(
						new articleVariant(1, "butter", 0.00),
						new articleVariant(2, "whole-grain", 0.00),
						new articleVariant(3, "bacon", 0.50)
					)
			);
			$items[] = new article(3, "Bread", 2.00, "Homemade bread. Freshly baked each morning.", "./img/user-c.png",
					array(
						new articleVariant(1, "butter", 0.00),
						new articleVariant(2, "whole-grain", 0.00),
					)
			);
			break;
	}
	return $items; // a real function
}

function getItem ($artId, $lang) {
	$itemList = getCategoryItems(42,$lang); // temp hack until db is integrated
	foreach ( $itemList as $item ) {
		if ($item->getId() == $artId) {
			return $item;
		}
	}
}


?>