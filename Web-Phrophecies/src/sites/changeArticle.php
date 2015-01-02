<?php 

require_once ROOT . "DBInterface/articleDB.php";

// User has to be logged in and have the correct role to use administration
if (isset ( $_SESSION ["user"] )) {
	if ($_SESSION ["user"]->getRoleId () == 2) {
		// User is logged in and has an admin role - continue!
		showArticleAdministration ();
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
function showArticleAdministration() {
	
	$artID = -1;
	$artSystemName = '';
	$artSystemDescription = '';
	$artPrice ='';
	$artImagePath = '';
	$action = 'add';

		
	if((isset($_GET['origin']) && $_GET['origin'] == 'update') && isset($_GET['artId'])){
		
		if(isset($_GET['artId'])){
			$artID = $_GET['artId'];
		}
			$action = 'update';
			$lang = get_language();
			include_once ("./includes/items.php");
			
			$item = getSysItem ( $artID);
			
			$artID = $item->getId();
			$artSystemName = $item->getName();
			$artSystemDescription = $item->getDescription();
			$artPrice = $item->getPrice();
			$artImagePath = $item->getImage();
			
		}
	else if (isset($_GET['origin']) && $_GET['origin'] == 'add'){
			$action = 'add';
	}

	
	
	
	echo "<form action=\"index.php?site=administration\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"artId\" value=\"$artID\" /input>";
	echo "<table>";
	echo 	"<tr>";
	echo 		"<td >Articlename: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artSystemName\" value=\"$artSystemName\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo "<table>";
	echo 	"<tr>";
	echo 		"<td >Articledescription: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artSystemDescription\" value=\"$artSystemDescription\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo 	"<tr>";
	echo 	"<td >Articleprice: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artPrice\" value=\"$artPrice\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo 	"<tr>";
	echo 	"<td >Articleimage: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artImagePath\" value=\"$artImagePath\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo "</table>";
	echo "<input type=\"hidden\" name=\"action\" value=\"$action\" /input>";
	echo "<input class=\"basket-update-button\"  type=\"submit\" value=\"Save\"/>";
	
	echo "</form>";
	



}



?>