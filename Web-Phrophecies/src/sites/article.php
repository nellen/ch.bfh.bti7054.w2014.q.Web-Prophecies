<?php 

$lang = get_language();
include_once ("./includes/items.php");
$item = getItem ( $_GET["artId"], $lang );

echo $item->getArticleView($lang);

?>