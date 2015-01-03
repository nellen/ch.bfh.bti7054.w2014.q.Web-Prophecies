<?php 

require_once ROOT . "DBInterface/articleDB.php";
require_once ROOT . "DBInterface/categoryDB.php";
require_once ROOT . "DBInterface/categoryArticleDB.php";
require_once ROOT . "DBInterface/languageDB.php";
require_once ROOT . "DBInterface/articleTranslationDB.php";

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

	$categoryDB = new CategoryDB();
	$categoryArticleDB = new CategoryArticleDB();
	$languageDB = new LanguageDB();
	
	$sqlcategoryArticleRes = $categoryArticleDB->getAllCategorysByArticle($artID);
	
	$sqlcategoryRes = $categoryDB->getAllCategorys();
	$selectedCats = array();
 	while($catArt = $sqlcategoryArticleRes->fetch_object()){
		$selectedCats[] = $catArt->categoryId;
	}
	
	$sqllanguageRes = $languageDB->getAllLanguages();
	
	echo "<form action=\"index.php?site=administration\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"artId\" value=\"$artID\" /input>";
	echo "<table style=\"width:95%\">";
	echo 	"<tr>";
	echo 		"<td >Systemname: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artSystemName\" maxlength=\"45\" value=\"$artSystemName\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo 	"<tr>";
	echo 		"<td >Systemdescription: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artSystemDescription\" value=\"$artSystemDescription\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo 	"<tr>";
	echo 	"<td >Price: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"number\" name=\"artPrice\" value=\"$artPrice\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo 	"<tr>";
	echo 	"<td >Imagepath: </td>";
	echo 		"<td>";
	echo 			"<input  type=\"text\" name=\"artImagePath\"  maxlength=\"150\" value=\"$artImagePath\"  /input>";
	echo		"</td>";
	echo 	"</tr>";
	echo 	"<tr>";
	echo 	"<td >Article Category: </td>";
	echo 		"<td>";
	echo 			"<select name=\"category[]\" size=\"4\" multiple=\"multiple\" tabindex=\"1\">";
	
	while($cat = $sqlcategoryRes->fetch_object()){
    	echo   "<option value=\"$cat->Category_ID\" ";
    	foreach ($selectedCats as $selected){
    		if ($selected == $cat->Category_ID){
    			echo "selected=\"selected\" ";
    			break;
    		}
    	}
    	
    	
    	echo 	">$cat->CategoryName</option>";
	}


    echo 			"</select>";
	echo		"</td>";
	echo 	"</tr>";
		
	printLanguagePart($sqllanguageRes, $artID);
	
	echo "</table>";
	echo "<input type=\"hidden\" name=\"action\" value=\"$action\" /input>";
	echo "<input class=\"basket-update-button\"  type=\"submit\" value=\"Save\"/>";
	
	echo "</form>";
	



}

function printLanguagePart($sqllanguageRes, $artID){
	
	$articleTranslationDB = new ArticleTranslationDB();
	
	echo 	"<tr>";
	echo 	"<td >Translations: </td>";
	echo 	"</tr>";
	
	while($language = $sqllanguageRes->fetch_object()){
		
		$translatedName = '';
		$translatedDescription = '';
		$sqlTransRes = $articleTranslationDB->getArticletranslation($artID, $language->Language_ID);
		while($trans = $sqlTransRes->fetch_object()){
			$translatedName = $trans->TranslatedName;
			$translatedDescription = $trans->TranslatedDescription;
		}
		echo 	"<tr></tr>";
		echo 	"<tr>";
		echo 		"<td >$language->EnglishName: </td>";
		echo 	"</tr>";
		echo 	"<tr>";
				echo 		"<td >Translated Name: </td>";
						echo 		"<td>";
						echo 			"<input  type=\"text\" name=\"" . $language->Language_ID . "translatedName\" maxlength=\"45\" value=\"$translatedName\"  /input>";
						echo		"</td>";
						echo 	"</tr>";
						echo 	"<tr>";
						echo 		"<td >Translated Description: </td>";
		echo 		"<td>";
		echo 			"<input  type=\"text\" name=\"" . $language->Language_ID . "translatedDescription\" value=\"$translatedDescription\"  /input>";
		echo		"</td>";
			echo 	"</tr>";
		}
	
}



?>