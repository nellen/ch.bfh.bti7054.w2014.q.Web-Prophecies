<?php 

class basket {

	private $items = array();

	

	public function addItem($artId,$varId) {
		//add item to basket
		$found = false;
		foreach ($this->items as $key => $item){
			if($item['artId'] == $artId && $item['varId'] == $varId){
				$this->items[$key]['quantity'] = $item['quantity'] + 1;
				$found = true;
				break;
			}
		}
		if (!$found){
			$this->items[] = array('artId' => $artId, 'varId'=> $varId, 'quantity' => 1);
		}
	}
	
	public function removeItem($recordKey,$newQuantity) {
		if(is_numeric($newQuantity)){
			if ($newQuantity > 0){
				$this->items[$recordKey]['quantity'] = $newQuantity;
			}
			else{
				unset($this->items[$recordKey]);
				$this->items[] = array_values($this->items);
			}
		}
	}
	
	public function display($lang) {

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
		
		foreach ($this->items as $key => $_basketitem){
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
	

}

?>

