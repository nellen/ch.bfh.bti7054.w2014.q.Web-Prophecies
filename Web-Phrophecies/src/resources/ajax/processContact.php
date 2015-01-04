<?php

include_once("../../config.php");

session_start (); // create or recover session

require_once ROOT . "includes/mail.php";
include_once ROOT . "includes/items.php";
include_once ROOT . "includes/functions.php";
include_once ROOT . "includes/langController.php";

$lang = $_POST["lang"];
require ( ROOT . 'resources/' . $lang . '.php');

function __autoload($class_name) {
	require_once(ROOT . "includes/".$class_name.".inc.php");
}

// When page is loaded without POST variables, we assume that something is not ok - so we relocate the user to index.php
if (!isset( $_POST["firstname"] ) ||  $_POST["firstname"] == "") {
	header ("Location: " . ROOT . "index.php");
}


$firstname 	= $_POST["firstname"];
$lastname 	= $_POST["lastname"];
$phonenumber = $_POST["phonenumber"];
$email		= $_POST["email"];
$comments = $_POST["comments"];

$Subject = $processMailSubject;
$MessageHTML = generateMailHTMLBody($lang);
$MessageTEXT = generateMailPlainBody($lang);

$Send = SendMail( $email, $Subject, $MessageHTML, $MessageTEXT );
if ( $Send ) {
	echo "<h2> Sent OK </h2>";
}
else {
	echo "<h2> ERROR </h2>";
}
die;

function generateMailHTMLBody($lang) {
	
	require ( ROOT . 'resources/' . $lang . '.php' );
	
	$mailbody = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" 
				\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
				<html xmlns=\"http://www.w3.org/1999/xhtml\">
 				<head>
 				<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8 \" />
 				<title>Your order confirmation - The Breakfast Company</title>
  				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
				</head>
				<body>";
	$mailbody .= "<p>Thank you for your order!<br /></p>";
	$mailbody .= "<h3>$confirmShippingInfo</h3>";
	$mailbody .= "<p>";
	$mailbody .= "$AddressFirstnameLabel: " . $_POST["firstname"] . "<br />";
	$mailbody .= "$AddressLastnameLabel: ". $_POST["lastname"]. "<br />";
	$mailbody .= "$AddressCityLabel: ". $_POST["phonenumber"]. "<br />";
	$mailbody .= "$AddressEmailLabel: ". $_POST["email"]. "<br />";
	$mailbody .= "<br /><br />";
	$mailbody .= "</p>";
	$mailbody .= "<h3>Comment:</h3>";
	$mailbody .= "<p>" . $_POST["comments"] ."</p>";
	$mailbody .= "<p>Kind Regards,<br />The BreakFast Company</p>";
	$mailbody .= "</body></html>";
	
	return $mailbody;
}

function generateMailPlainBody($lang) {

	require ( ROOT . 'resources/' . $lang . '.php' );
	
	$mailbody = "Thank you for your order!
			Kind Regards, 
			The BreakFast Company";
	
	return $mailbody;
}

?>
