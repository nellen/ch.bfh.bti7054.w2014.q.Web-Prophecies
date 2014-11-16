<?php 

$lang = get_language ();

echo "<form name=\"billingForm\" action=\"index.php?site=confirm&lang=".$lang."\" onsubmit=\"return validateForm();\" method=\"post\">";
echo "<table class=\"address-form-table\">";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">Firstname:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"firstname\"  /input>";
echo		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo		"<td class=\"address-form-table-label\">Lastname:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"lastname\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">City \ Zip Code:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field-zip\" type=\"text\" name=\"zip\"  /input>";
echo 			"<input class=\"address-form-field-city\" type=\"text\" name=\"city\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">Street:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"street\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">E-mail:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"email\"  /input>";
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
	    if (value.length != 4 && !isNaN(value)) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }

		//check email
		element = document.forms["billingForm"]["email"];
		value = element.value;
	    var atpos = value.indexOf("@");
	    var dotpos = value.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=value.length) {
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