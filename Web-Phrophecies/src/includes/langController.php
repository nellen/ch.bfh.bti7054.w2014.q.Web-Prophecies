<?php
require_once 'functions.php';

$lang = get_language();

require ('./resources/' . $lang . '.php');

function get_localization($key) {
	$lang = get_language();
	require ('./resources/' . $lang . '.php');
	return $$key;
}

?>