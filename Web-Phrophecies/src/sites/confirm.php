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

echo "Firstname: ". $_POST["firstname"]. "<br/>";
echo "Lastname: ". $_POST["lastname"]. "<br/>";
echo "City: ". $_POST["city"]. "<br/>";
echo "Zip Code: ". $_POST["zip"]. "<br/>";
echo "Street: ". $_POST["street"]. "<br/>";
echo "E-mail: ". $_POST["email"]. "<br/>";
echo "<br />";

?>

<button onclick="myVerificationFunction()">Finish</button>

<p id="Status"></p>

