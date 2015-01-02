<?php
function get_site() {
	if (isset ( $_GET ["site"] )) {
		$site = $_GET ["site"];
	} else {
		$site = "main";
	}
	return $site;
}
function get_language() {
	if (isset ( $_COOKIE ["lang"] )) {
		$lang = $_COOKIE ["lang"];
	} else {
		$lang = "en";
	}
	return $lang;
}
function get_category() {
	if (isset ( $_GET ["category"] )) {
		$category = $_GET ["category"];
	} else {
		$category = NULL;
	}
	return $category;
	}
	
function formatPrice($price){
	return number_format($price, 2, ".", "'");
}
?>