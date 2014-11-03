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
	if (isset ( $_GET ["lang"] )) {
		$lang = $_GET ["lang"];
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
?>