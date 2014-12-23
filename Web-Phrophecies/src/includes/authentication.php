<?php
session_start ();

function verifyCredentials($username, $password) {
	$loginDB = new LoginDB ();
	$user = null;
	$users = array ();
	
	$res = $loginDB->getAccount ( $username );
	while ( $users = $res->fetch_object () ) {
		if ($users->Username == null) {
			exit ();
		}
		$dbUsername = $users->Username;
		$dbPassword = $users->Password;
		$dbRoleId = $users->Role_ID;
		$dbCostumerId = $users->Costumer_ID;
		
		$user = new User ( $dbUsername );
		$user->setPassword ( $dbPassword );
		$user->setRoleId ( $dbRoleId );
		$user->setCostumerId ( $dbCostumerId );
	}
	
	if ($user != null) {
		if (strtolower($user->getUsername()) == strtolower($username) && $user->getPassword() == $password) {
			$_SESSION ["user"] = $user;
			header ( "Location: ../index.php" );
		}
	}
}

if (isset ( $_POST ["username"] ) && isset ( $_POST ["password"] )) {
	
	 if( $_POST["username"]=="Username" && $_POST["password"]=="Password") {
		echo "hello";
		exit;
	 }
	 
	
	require_once "../DBInterface/loginDB.php";
	require_once "./user.inc.php";
	
	$username = $_POST ["username"];
	$password = $_POST ["password"];
	
	verifyCredentials ( $username, $password );
}
if (! isset ( $_SESSION ["user"] )) {
	echo "<html><body>Wrong credentials provided<br />";
	echo "<a href='../index.php'>Back to Login</a>";
	echo "</body></html>";
	exit ();
}

?>