
<script type="text/javascript">

// performs some basic checks on the login form
function checkForm(form)
{
	if(form.username.value == "") {
		alert("Error: Username cannot be blank!");
		form.username.focus();
		return false;
	}
	if(form.username.value == "Username" || form.username.value == "username") {
		alert("Error: Your username cannot be 'Username'!");
		form.username.focus();
		return false;
	}
	re = /^\w+$/;
	if(!re.test(form.username.value)) {
		alert("Error: Username must contain only letters, numbers and underscores!");
		form.username.focus();
		return false;
	}

	if(form.password.value != "") {
		if(form.password.value.length < 4) {
			alert("Error: Password must contain at least four characters!");
			form.password.focus();
			return false;
		}
	}
}

</script>

<?php

// Checks if a username is stored in session variable
if (! isset ( $_SESSION ["user"] )) {
	// the user is not logged, so show the login form
	echo '
		<h3>Login to your Account</h3>
		<form onsubmit="return checkForm(this);" action="./includes/authentication.php" method="post"> 
			<input type="text" name="username" value="Username" onfocus="this.value = this.value==\'Username\'?\'\':this.value;" 
				onblur="this.value = this.value==\'\'?\'Username\':this.value;" /><br /> 
			<input type="password" name="password" value="Password" onfocus="if (this.value==\'Password\') this.value=\'\'" 
				onblur="this.value = this.value==\'\'?\'Password\':this.value;" /><br />  
			<input type="submit" value="Login" />
		</form>';
} else {
	// the user is logged in, salute him and show logout link
	echo "<p>Hello " . $_SESSION ["user"]->getUsername () . "</p>";
	echo "<a href='./includes/logout.php'>Logout</a>";
}
?>