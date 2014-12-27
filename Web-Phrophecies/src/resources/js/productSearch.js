/**
 * 
 */
function getProductHint(value) {
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else if (window.ActiveXObject){
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Your browser does not support XMLHTTP!");
		return;
	}

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4){
			if (xmlhttp.responseText.length > 0){
				document.getElementById("searchResult").innerHTML = xmlhttp.responseText;
			}
		}	
	}

	xmlhttp.open("GET", "./resources/ajax/productSearch.php?keyword=" + value, true);
	xmlhttp.send(null);
}