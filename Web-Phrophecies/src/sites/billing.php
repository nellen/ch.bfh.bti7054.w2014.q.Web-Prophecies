<?php 

include_once  ROOT . "includes/customers.php";

$lang = get_language ();

$firstname = '';
$lastname = '';
$zip ='';
$city = '';
$address1 = '';
$address2 = '';
$email = '';

if (isset($_SESSION ["user"])){
	$customer = getCustomer($_SESSION ["user"]->getCostumerId());
	if ($customer != null){
		$firstname = $customer->getFirstname();
		$lastname = $customer->getLastname();
		if ($customer->getShippingAddress() != null){
			$zip = $customer->getShippingAddress()->getZip();
			$city = $customer->getShippingAddress()->getCity();
			$address1 = $customer->getShippingAddress()->getAddress1();
			$address2 = $customer->getShippingAddress()->getAddress2();
		}
		$email = $customer->getEmail();
	}

	
}


echo "<form name=\"billingForm\" action=\"index.php?site=confirm&lang=".$lang."\" onsubmit=\"return validateForm();\" method=\"post\">";
echo "<table class=\"address-form-table\">";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">$AddressFirstnameLabel: </td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"firstname\" value=\"$firstname\"  /input>";
echo		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo		"<td class=\"address-form-table-label\">$AddressLastnameLabel: </td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"lastname\"  value=\"$lastname\" /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">$AddressZIPLabel \ $AddressCityLabel: </td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field-zip\" type=\"text\" name=\"zip\"  value=\"$zip\" /input>";
echo 			"<input class=\"address-form-field-city\" type=\"text\" name=\"city\" value=\"$city\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">$AddressAddress1Label: </td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"address1\" value=\"$address1\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">$AddressAddress2Label: </td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"address2\" value=\"$address2\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">$AddressEmailLabel: </td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"email\" value=\"$email\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo "</table>";
echo "<input class=\"billing-button\" type=\"submit\" value=\"Submit\"/>";
echo "</form>";

?>

<script>
	function validateForm() {
		var errorCounter = 0;

		//check firstname
		var element = document.forms["billingForm"]["firstname"];
		var value = element.value;
	    if (value.length == 0) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }

		//check lastname
		element = document.forms["billingForm"]["lastname"];
		value = element.value;
	    if (value.length == 0) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }

		//check zipcode
		element = document.forms["billingForm"]["zip"];
		value = element.value;
	    if (!value.match("^[0-9]{4}$")) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }

		//check email
		element = document.forms["billingForm"]["email"];
		value = element.value;
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    if (!reg.test(value)) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }

	    if (errorCounter > 0) {
	        alert("Please check your entered data");
	        return false;
	    }
	}
	
</script>