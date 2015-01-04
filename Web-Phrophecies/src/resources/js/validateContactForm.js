/**
 * 
 */

	function validateForm() {
		var errorCounter = 0;

		//check firstname
		var element = document.forms["htmlform"]["firstname"];
		var value = element.value;
	    if (value.length == 0) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }

		//check lastname
		element = document.forms["htmlform"]["lastname"];
		value = element.value;
	    if (value.length == 0) {
	    	element.style.backgroundColor = "red";
	    	errorCounter++;
	    }
	    else{
	    	element.style.backgroundColor = null;
	    }


		//check email
		element = document.forms["htmlform"]["email"];
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
	
