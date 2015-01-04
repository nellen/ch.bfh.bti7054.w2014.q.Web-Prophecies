<?php 
echo "<h2>" . $welcome;
// if a user is logged in, show his user name
if (isset($_SESSION["user"])) {
	echo $_SESSION["user"]->getUsername() . "!";
}		
echo "</h2>";

// TODO temporary image & styling until final image is delivered
echo "<img src=\"./img/smiley.jpg\" style=\"width:500px;margin-left:auto;margin-right:auto;display:block;margin-bottom:20px\" />";
?>