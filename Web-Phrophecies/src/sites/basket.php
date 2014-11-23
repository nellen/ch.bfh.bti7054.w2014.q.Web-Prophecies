<?php

include_once ("./includes/items.php");
$lang = get_language ();

if (isset($_POST['artId']) && isset($_POST['varId'])){

	if (isset($_SESSION['basket'])){
		//add item to basket
		$found = false;
		foreach ($_SESSION['basket'] as $key => $_basketitem){
			if($_basketitem['artId'] == $_POST['artId'] && $_basketitem['varId'] == $_POST['varId']){
				$_SESSION['basket'][$key]['quantity'] = $_basketitem['quantity'] + 1;
				$found = true;
				break;
			}
		}
		if (!$found){
			$_SESSION['basket'][] = array('artId' => $_POST['artId'], 'varId'=> $_POST['varId'], 'quantity' => 1);
		}
	}
	else{
		//init basket
		$_SESSION['basket'] = array();
		//add item to basket
		$_SESSION['basket'][] = array('artId' => $_POST['artId'], 'varId'=> $_POST['varId'], 'quantity' => 1);
	}
}

if (!isset($_SESSION['basket'])){
	echo "Shopping basket is empty";
}
else{
	
	if(isset($_POST['recordKey'])){
		if(is_numeric($_POST["newQuantity"])){
			if ($_POST["newQuantity"] > 0){
				$_SESSION['basket'][$_POST['recordKey']]['quantity'] = $_POST["newQuantity"];
			}
			else{
				unset($_SESSION['basket'][$_POST['recordKey']]);
				$_SESSION['basket'] = array_values($_SESSION['basket']);
			}
		}
	}
	
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
	
	foreach ($_SESSION['basket'] as $key => $_basketitem){
		$item = getItem ( $_basketitem["artId"], $lang );
		$pricePerUnit = $item->getPriceWithVariant($_basketitem["varId"]);
		echo "<form action=\"index.php?". $_SERVER['QUERY_STRING']."\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"recordKey\" value=\"". $key. "\" /input>";
		echo "<tr>";
		echo 	"<td>";
		echo		"<input type=\"text\" name=\"newQuantity\" maxlength=\"4\" size=\"5\"  value=\"".$_basketitem['quantity']. "\" />";
		echo 	"</td>";
		echo	"<td>".$item->getName()."</td>";
		echo	"<td>".$item->getVariantName($_basketitem["varId"])."</td>";
		echo	"<td>".$pricePerUnit."</td>";
		echo	"<td>". $pricePerUnit * $_basketitem['quantity']."</td>";
		echo	"<td> <input class=\"basket-update-button\" type=\"submit\" value=\"Update\"/></td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<form action=\"index.php\" method=\"get\">";
	echo "<input type=\"hidden\" name=\"site\" value=\"billing\" /input>";
	echo "<input class=\"list-article-button\" type=\"submit\" value=\"Checkout\"/>";
	echo "</form>";
}


?>