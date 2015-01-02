<?php 

require_once ROOT . "includes/mail.php";

echo "<h3>$confirmShippingInfo:</h3>";

// When language is changed, POST variables get lost. With this hack, the user is redirected to the billing address form
if (!isset( $_POST["firstname"] ) ||  $_POST["firstname"] = "") {
	header ("Location: index.php?site=billing");
}

echo "$AddressFirstnameLabel: ". $_POST["firstname"]. "<br/>";
echo "$AddressLastnameLabel: ". $_POST["lastname"]. "<br/>";
echo "$AddressCityLabel: ". $_POST["city"]. "<br/>";
echo "$AddressZIPLabel: ". $_POST["zip"]. "<br/>";
echo "$AddressAddress1Label: ". $_POST["address1"]. "<br/>";
echo "$AddressAddress2Label: ". $_POST["address2"]. "<br/>";
echo "$AddressEmailLabel: ". $_POST["email"]. "<br/>";
echo "<br />";

if (!isset($_SESSION['basket'])){
	echo $confirmEmptyBasket;
}
else{
	$_SESSION['basket']->displaySummary($lang);
}

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
	} else {
		statusField = "<?php echo $confirmStatusFieldCancel?>";
		location.href='index.php?site=basket';
	}
	document.getElementById("Status").innerHTML = statusField;
}
</script>