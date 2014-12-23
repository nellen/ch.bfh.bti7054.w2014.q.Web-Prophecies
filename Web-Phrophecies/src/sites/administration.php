<?php
if (isset ( $_SESSION ["user"] )) {
	if ($_SESSION ["user"]->getRoleId () == 1) {
		// User is logged in and has an admin role - continue!
		articleAdministration();
	} else {
		// User is logged in, but without an admin role
		echo "You aren't allowed to view this page.<br />";
		echo "<a href='./index.php'>Back to Home</a>";
	}
} else {
	// User is not logged in...
	echo "Please log in to display this page.<br />";
	echo "<a href='./index.php'>Back to Login</a>";
}

// This function is reached, when an admin is logged in
function articleAdministration() {
	echo "Admin Stuff will be here...";
}

?>