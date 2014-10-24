<?php
function getCategoryItems ($CatId, $lang) {
	switch($lang) {
		case "en":
			$items = array(
			array("name" => "Croissant", "image" => "./img/user-a.png", "price" => 1.50,
			"discription" => "Homemade croissants. Freshly baked each morning.",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00)
			)
			),
			array("name" => "Bun", "image" => "./img/user-b.png", "price" => 1.50,
			"discription" => "Homemade buns. Freshly baked each morning.",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00),
			array("variantname" => "bacon", "price" => 0.50)
			)
			),
			array("name" => "Bread", "image" => "./img/user-c.png", "price" => 2.00,
			"discription" => "Homemade bread. Freshly baked each morning.",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00)
			)
			)
			);
			break;
		case "de":
			$items = array(
			array("name" => "Gipfeli", "image" => "./img/user-a.png", "price" => 1.50,
			"discription" => "Hausgemachte Gipfeli.  Jeden Morgen frisch gebacken.",
			"variants" =>
			array(
			array("variantname" => "mit Butter", "price" => 0.00),
			array("variantname" => "Vollkorn", "price" => 0.00)
			)
			),
			array("name" => "Brötchen", "image" => "./img/user-b.png", "price" => 1.50,
			"discription" => "Hausgemachte Brötchen. Jeden Morgen frisch gebacken.",
			"variants" =>
			array(
			array("variantname" => "mit Butter", "price" => 0.00),
			array("variantname" => "Vollkorn", "price" => 0.00),
			array("variantname" => "Speck", "price" => 0.50)
			)
			),
			array("name" => "Brot", "image" => "./img/user-c.png", "price" => 2.00,
			"discription" => "Hausgemachtes Brot. Jeden Morgen frisch gebacken.",
			"variants" =>
			array(
			array("variantname" => "mit Butter", "price" => 0.00),
			array("variantname" => "Vollkorn", "price" => 0.00)
			)
			)
			);
			break;
		case "fr":
			$items = array(
			array("name" => "Croissant", "image" => "./img/user-a.png", "price" => 1.50,
			"discription" => "discription fr",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00)
			)
			),
			array("name" => "Bun", "image" => "./img/user-b.png", "price" => 1.50,
			"discription" => "discription fr",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00),
			array("variantname" => "bacon", "price" => 0.50)
			)
			),
			array("name" => "Bread", "image" => "./img/user-c.png", "price" => 2.00,
			"discription" => "discription fr",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00)
			)
			)
			);
			break;
		default:
			$items = array(
			array("name" => "Croissant", "image" => "./img/user-a.png", "price" => 1.50,
			"discription" => "Homemade croissants. Freshly baked each morning.",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00)
			)
			),
			array("name" => "Bun", "image" => "./img/user-b.png", "price" => 1.50,
			"discription" => "Homemade buns. Freshly baked each morning.",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00),
			array("variantname" => "bacon", "price" => 0.50)
			)
			),
			array("name" => "Bread", "image" => "./img/user-c.png", "price" => 2.00,
			"discription" => "Homemade bread. Freshly baked each morning.",
			"variants" =>
			array(
			array("variantname" => "butter", "price" => 0.00),
			array("variantname" => "whole-grain", "price" => 0.00)
			)
			)
			);
			break;
	}
	return $items; // a real function
}




?>