<script>
function myVerificationFunction() {
	var x;
	if (confirm("Did you verify information regarding your order? \nYour order will only be processed when you click OK. To stop press CANCEL") == true) {
		x = "You pressed OK. Thank you for your order!";
	} else {
		x = "You pressed Cancel. Your order will not be transmitted!";
	}
	document.getElementById("Status").innerHTML = x;
}
</script>

<?php 

require_once './includes/mail.php';

echo "<h3>Shipping Information:</h3>";


echo "$AddressFirstnameLabel: ". $_POST["firstname"]. "<br/>";
echo "$AddressLastnameLabel: ". $_POST["lastname"]. "<br/>";
echo "$AddressCityLabel: ". $_POST["city"]. "<br/>";
echo "$AddressZIPLabel: ". $_POST["zip"]. "<br/>";
echo "$AddressAddress1Label: ". $_POST["address1"]. "<br/>";
echo "$AddressAddress2Label: ". $_POST["address2"]. "<br/>";
echo "$AddressEmailLabel: ". $_POST["email"]. "<br/>";
echo "<br />";

if (!isset($_SESSION['basket'])){
	echo "Shopping basket is empty";
}
else{
	$_SESSION['basket']->displaySummary($lang);
}

?>

<button onclick="myVerificationFunction()">Finish</button>

<p id="Status"></p>

