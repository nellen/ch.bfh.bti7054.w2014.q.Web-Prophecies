<?php 

$lang = get_language();
include_once ("./includes/items.php");
$item = getItem ( $_GET["artId"], $lang );


echo "<div class=\"article\">";
echo "<h1>". $item->getName() . "</h1>";
echo "<img src=\"./img/user-a.png\" width=\"100px\" height=\"100px\"/>";
echo "<p class=\"article-price\">".$priceLabel.": ". $item->getPrice() . " CHF</p>";

echo "<form action=\"index.php?site=basket\" method=\"post\">";
echo "<input type=\"hidden\" name=\"artId\" value=\"". $item->getId(). "\" /input>";
echo "<select name =\"varId\" size=\"1\">";
echo "<option value=\"0\">normal</option>";
foreach ( $item->getVariants() as $variant ) {
	echo "<option value=\"" . $variant->getId() . "\">" . $variant->getName() . " + " . $variant->getPrice() . " CHF</option>";
}

echo "</select>";
echo "<p>". $item->getDescription() . "</p>";
echo "<br/>";
echo "<input class=\"article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
echo "</form>";

echo "</div>";

?>