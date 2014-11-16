<?php 

$lang = get_language ();
include_once ("./includes/items.php");
$item = getItem ( $_GET["artId"], $lang );

if (isset($_POST['artId']) && isset($_POST['varId'])){

	if (isset($_SESSION['basket'])){
		//add item to basket
		$found = false;
		foreach ($_SESSION['basket'] as $_basketitem){
			if($_basketitem['artId'] == $_POST['artId'] && $_basketitem['varId'] == $_POST['varId']){
				$_basketitem['quantity'] = $_basketitem['quantity'] + 1;
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


echo "<div class=\"article\">";
echo "<h1>". $item["name"] . "</h1>";
echo "<img src=\"./img/user-a.png\" width=\"100px\" height=\"100px\"/>";
echo "<p class=\"article-price\">".$priceLabel.": ". $item["price"] . " CHF</p>";

echo "<form action=\"index.php?". $_SERVER['QUERY_STRING']."\" method=\"post\">";
echo "<input type=\"hidden\" name=\"artId\" value=\"". $item ["artId"]. "\" /input>";
echo "<select name =\"varId\" size=\"1\">";
echo "<option value=\"0\">normal</option>";
foreach ( $item ["variants"] as $variant ) {
	echo "<option value=\"" . $variant ["varId"] . "\">" . $variant ["variantname"] . " + " . $variant ["price"] . " CHF</option>";
}

echo "</select>";
echo "<p>". $item["discription"] . "</p>";
echo "<br/>";
echo "<input class=\"article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
echo "</form>";

echo "</div>";

?>