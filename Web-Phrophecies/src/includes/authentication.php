<?php
	session_start();
	if(isset($_POST["username"])) {
		if($_POST["username"]=="Hello" && $_POST["password"]=="World"
			|| $_POST["username"]=="Username" && $_POST["password"]=="Password") {
			$_SESSION["user"]=$_POST["username"];
		header ("Location: ../index.php");
		}
	} else {
	}
	if (!isset($_SESSION["user"])) {
		echo "<html><body> No access<br />";
		echo "<a href='../index.php'>Back to Login</a>";
		echo "</body></html>";
		exit;
	}
	
?>