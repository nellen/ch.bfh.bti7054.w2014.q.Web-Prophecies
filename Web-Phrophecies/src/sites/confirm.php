<?php 

echo "<h3>$confirmShippingInfo:</h3>";

// When language is changed, POST variables get lost. With this hack, the user is redirected to the billing address form
if (!isset( $_POST["firstname"] ) ||  $_POST["firstname"] == "") {
	header ("Location: index.php?site=billing");
}

echo "$AddressFirstnameLabel: " . $_POST["firstname"] . "<br/>";
echo "$AddressLastnameLabel: " . $_POST["lastname"] . "<br/>";
echo "$AddressCityLabel: " . $_POST["city"] . "<br/>";
echo "$AddressZIPLabel: " . $_POST["zip"] . "<br/>";
echo "$AddressAddress1Label: " . $_POST["address1"] . "<br/>";
echo "$AddressAddress2Label: " . $_POST["address2"] . "<br/>";
echo "$AddressEmailLabel: " . $_POST["email"] . "<br/>";
echo "<br />";

$firstname 	= $_POST["firstname"];
$lastname 	= $_POST["lastname"];
$city		= $_POST["city"];
$zip		= $_POST["zip"];
$address1	= $_POST["address1"];
$address2	= $_POST["address2"];
$email		= $_POST["email"];

if (!isset($_SESSION['basket'])){
	echo $confirmEmptyBasket;
	header ("Location: " . ROOT . "index.php?site=shop");
}
else{
	$basketContent = $_SESSION['basket']->displaySummary($lang);
}

echo $basketContent;

$slashedBasketContent = addcslashes($basketContent,'"');

$changeFrom = array("&auml;","&ouml;","&uuml;", "&Auml;","&Ouml;","&Uuml;");
$changeTo = array("ae", "oe", "ue", "Ae", "Oe", "Ue");
$basketContentPost = str_replace($changeFrom, $changeTo, $slashedBasketContent);

?>

<button onclick="myVerificationFunction()">Finish</button>

<p id="Status"></p>

<script>

function myVerificationFunction() {
	var statusField;
	var question1 = "<?php echo $confirmConfirmationQuestion1 ?>";
	var question2 = "<?php echo $confirmConfirmationQuestion2 ?>";
	var question3 = "<?php echo $confirmConfirmationQuestion3 ?>";
	if (confirm(question1 + "\n" + question2 + "\n" + question3) == true) {
		statusField = "<?php echo $confirmStatusFieldOK ?>";	
		processOrder();
	} else {
		statusField = "<?php echo $confirmStatusFieldCancel?>";
		location.href = 'index.php?site=basket';
	}
	document.getElementById("Status").innerHTML = statusField;
}

function processOrder() {
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else if (window.ActiveXObject){
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Your browser does not support XMLHTTP!");
		return;
	}
	
	xmlhttp.open("POST", "./resources/ajax/processOrder.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("firstname=" + "<?php echo $firstname ?>" + "&lastname=" + "<?php echo $lastname ?>" + "&city=" + "<?php echo $city ?>" + "&zip=" + "<?php echo $zip ?>" + "&address1=" + "<?php echo $address1 ?>" + "&address2=" + "<?php echo $address2 ?>" + "&email=" + "<?php echo $email ?>" + "&lang=" + "<?php echo $lang ?>" + "&basketcontent=" + "<?php echo $basketContentPost ?>");
}

</script>
