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
	    else{
	    	//TODO: correctly send contact email at the moment nothing happens
	    	//processContact();
	    }
	}
	
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
		
		var lang = document.forms["htmlform"]["lang"].value;
		var firstname = document.forms["htmlform"]["firstname"].value;
		var lastname = document.forms["htmlform"]["lastname"].value;
		var email = document.forms["htmlform"]["email"].value;
		var phonenumber = document.forms["htmlform"]["phonenumber"].value;
		var comments = document.forms["htmlform"]["comments"].value;
		
		xmlhttp.open("POST", "./resources/ajax/processContact.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("firstname=" + firstname + "&lastname=" + lastname + "&email=" + email + "&phonenumber=" + phonenumber + "&comments=" + comments + "&lang=" + lang);
	}