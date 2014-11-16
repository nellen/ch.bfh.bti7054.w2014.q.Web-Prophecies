<?php

include_once ("./includes/items.php");
$lang = get_language ();

if (!isset($_SESSION['basket'])){
	echo "Shopping basket is empty";
}
else{
	echo "<table border=\"1px\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Quantity</th>";
	echo "<th>Description</th>";
	echo "<th>Variation</th>";
	echo "<th>Price per Unit</th>";
	echo "<th>Price</th>";
	echo "<th>&nbsp;</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	foreach ($_SESSION['basket'] as $_basketitem){
		$item = getItem ( $_basketitem["artId"], $lang );
		$pricePerUnit = $item['price'];
		echo "<tr>";
		echo 	"<td>";
		echo		"<input type=\"text\" maxlength=\"4\" size=\"5\" readonly=\"readonly\" value=\"".$_basketitem['quantity']. "\" />";
		echo 	"</td>";
		echo	"<td>".$item['name']."</td>";
		if ($_basketitem["varId"] == 0){
			echo	"<td>normal</td>";
		}
		else{
			foreach ( $item ["variants"] as $variant ) {
				if($variant ["varId"] == $_basketitem["varId"]){
					echo	"<td>".$variant ["variantname"]."</td>";
					$pricePerUnit = $pricePerUnit + $variant ["price"];
					break;
				}
			}
		}
		echo	"<td>".$pricePerUnit."</td>";
		echo	"<td>". $pricePerUnit * $_basketitem['quantity']."</td>";
		echo	"<td> <img src=\"./img/trash.png\" width=\"30px \" onclick=\"msgDeleted()\" /></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}


?>