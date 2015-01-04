
<?php

include_once("../../config.php");

session_start (); // create or recover session

require_once ROOT . "includes/mail.php";
include_once ROOT . "includes/items.php";
include_once ROOT . "includes/functions.php";
include_once ROOT . "includes/langController.php";

$lang = $_POST["lang"];
require ( ROOT . 'resources/' . $lang . '.php');

$firstname = $_POST ["firstname"];
$lastname = $_POST ["lastname"];
$phonenumber = $_POST ["phonenumber"];
$email = $_POST ["email"];
$comments = $_POST ["comments"];

file_put_contents("/tmp/contactHandler.txt", $firstname . " " . $lastname . " " . $phonenumber . " " . $email . " " . $comments . " " . $lang);

?>


<script>
function processContact() {
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else if (window.ActiveXObject){
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Your browser does not support XMLHTTP!");
		return;
	}

	xmlhttp.open("POST", "./processContact.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("firstname=" + "<?php echo $firstname ?>" + "&lastname=" + "<?php echo $lastname ?>" + "&email=" + "<?php echo $email ?>" + "&phonenumber=" + "<?php echo $phonenumber ?>" + "&comments=" + "<?php echo $comments ?>" + "&lang=" + "<?php echo $lang ?>" );
}
</script>


<script type="text/javascript">
	processContact();
</script>
 
<?php
echo "<h3>$processContactGreetingInfo</h3>";
die ();
?>