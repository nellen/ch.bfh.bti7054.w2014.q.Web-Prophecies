<?php
// Checks if a username is stored in session variable
if (! isset ( $_SESSION ["user"] )) {
	// the user is not logged, so show the login form
	echo '
		<h3>Login to your Account</h3>
		<form action="./includes/authentication.php" method="post"> 
			<input type="text" name="username" value="Username" onfocus="this.value = this.value==\'Username\'?\'\':this.value;" 
				onblur="this.value = this.value==\'\'?\'Username\':this.value;" /><br /> 
			<input type="password" name="password" value="Password" onfocus="if (this.value==\'Password\') this.value=\'\'" 
				onblur="this.value = this.value==\'\'?\'Password\':this.value;" /><br />  
			<input type="submit" value="Login" />
		</form>';
} else {
	// the user is logged in, salute him and show logout link
	echo "<p>Hello " . $_SESSION ["user"] . "</p>";
	echo "<a href='./includes/logout.php'>Logout</a>";
}
?>