<?php

require_once ROOT . "includes/items.php";

class basket {
	private $items = array ();
	Public function getTotal() {
		$total = 0;
		foreach ( $this->items as $key => $_basketitem ) {
			$item = getItem ( $_basketitem ["artId"], $lang );
			$pricePerUnit = $item->getPriceWithVariant ( $_basketitem ["varId"] );
			$total += $pricePerUnit * $_basketitem ['quantity'];
		}
		return $total;
	}
	public function addItem($artId, $varId) {
		// add item to basket
		$found = false;
		foreach ( $this->items as $key => $item ) {
			if ($item ['artId'] == $artId && $item ['varId'] == $varId) {
				$this->items [$key] ['quantity'] = $item ['quantity'] + 1;
				$found = true;
				break;
			}
		}
		if (! $found) {
			$this->items [] = array (
					'artId' => $artId,
					'varId' => $varId,
					'quantity' => 1 
			);
		}
	}
	public function changeItem($recordKey, $newQuantity) {
		if (is_numeric ( $newQuantity )) {
			if ($newQuantity > 0) {
				$this->items [$recordKey] ['quantity'] = $newQuantity;
			} else {
				unset ( $this->items [$recordKey] );
				$this->items = array_values ( $this->items );
			}
		}
	}
	
	public function removeItem($recordKey) {
		unset ( $this->items [$recordKey] );
		$this->items = array_values ( $this->items );
	}
	
	public function display($lang) {
		$total = 0;
		
		include ROOT . "resources/$lang.php";
		
		echo "<table  class=\"basket-table\">";
		echo "<thead>";
		echo "<tr>";
		echo "<th>$basketDescriptionLabel</th>";
		echo "<th>$basketVariationLabel</th>";
		echo "<th class='price'>$basketPricePerUnitLabel</th>";
		echo "<th>$basketQuantityLabel</th>";
		echo "<th class='price'>$basketPriceLabel</th>";
		echo "<th>&nbsp;</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		
		foreach ( $this->items as $key => $_basketitem ) {
			$item = getItem ( $_basketitem ["artId"], $lang );
			$pricePerUnit = $item->getPriceWithVariant ( $_basketitem ["varId"] );
			echo "<form action=\"index.php?" . $_SERVER ['QUERY_STRING'] . "\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"recordKey\" value=\"" . $key . "\" /input>";
			echo "<tr>";
			echo "<td>" . $item->getName () . "</td>";
			echo "<td>" . $item->getVariantName ( $_basketitem ["varId"] ) . "</td>";
			echo "<td class='price'>" . formatPrice($pricePerUnit) . "</td>";
			echo "<td>";
			echo "<input type=\"text\" name=\"newQuantity\" maxlength=\"4\" size=\"5\"  value=\"" . $_basketitem ['quantity'] . "\" />";
			echo "</td>";
			echo "<td class='price'>" . formatPrice($pricePerUnit * $_basketitem ['quantity']) . "</td>";
			echo "<td> <input class=\"basket-update-button\" name=\"change\" type=\"submit\" value=\"$basketUpdateLabel\"/></td>";
			echo "<td> <input class=\"basket-delete-button\" name=\"delete\" type=\"submit\" value=\"$basketDeleteLabel\"/></td>";
				
			echo "</tr>";
			echo "</form>";
			
			$total += $pricePerUnit * $_basketitem ['quantity'];
		}
		
		echo "<tr>";
		echo "<td>$basketTotalLabel</td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td class='price'>" . formatPrice($total) . "</td>";
		echo "<td></td>";
		echo "</tr>";
		
		echo "</tbody>";
		echo "</table>";
		
		echo "<form action=\"index.php\" method=\"get\">";
		echo "<input type=\"hidden\" name=\"site\" value=\"billing\" /input>";
		echo "<input class=\"list-article-button\" type=\"submit\" value=\"Checkout\"/>";
		echo "<input class=\"list-article-button\" type=\"button\" onclick=\"location='index.php?site=shop'\" value=\"Back to Shop\"/>";
		echo "</form>";
	}
	public function displaySummary($lang) {
		$total = 0;
		
		include ROOT . "resources/$lang.php";
		
		$output = "<table class=\"basket-table\">";
		$output .= "<thead>";
		$output .= "<tr>";
		$output .= "<th>$basketDescriptionLabel</th>";
		$output .= "<th>$basketVariationLabel</th>";
		$output .= "<th class='price'>$basketPricePerUnitLabel</th>";
		$output .= "<th>$basketQuantityLabel</th>";
		$output .= "<th class='price'>$basketPriceLabel</th>";
		
		$output .= "</tr>";
		$output .= "</thead>";
		$output .= "<tbody>";
		
		foreach ( $this->items as $key => $_basketitem ) {
			$item = getItem ( $_basketitem ["artId"], $lang );
			$pricePerUnit = $item->getPriceWithVariant ( $_basketitem ["varId"] );
			$output .=  "<tr>";
			$output .=  "<td>" . $item->getName () . "</td>";
			$output .=  "<td>" . $item->getVariantName ( $_basketitem ["varId"] ) . "</td>";
			$output .=  "<td class='price'>" . formatPrice($pricePerUnit) . "</td>";
			$output .=  "<td>". $_basketitem ['quantity'] . "</td>";
			$output .=  "<td class='price'>" . formatPrice($pricePerUnit * $_basketitem ['quantity'])  . "</td>";
			$output .=  "</tr>";
			
			$total += $pricePerUnit * $_basketitem ['quantity'];
		}
		
		$output .=  "<tr>";
		$output .=  "<td>$basketTotalLabel</td>";
		$output .=  "<td></td>";
		$output .=  "<td></td>";
		$output .=  "<td></td>";
		$output .=  "<td class='price'>" . formatPrice($total) . "</td>";
		$output .=  "</tr>";
		
		$output .=  "</tbody>";
		$output .=  "</table>";
		
		return $output;
	}
}

?>

