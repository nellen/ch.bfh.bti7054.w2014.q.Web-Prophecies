<?php

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
	echo "<a href='./index.php?site=login_user'>Back to Login</a>";
}

// This function is reached, when an admin is logged in
function showArticleAdministration() {
	
	require_once ROOT . "includes/items.php";
	require_once ROOT . "DBInterface/articleDB.php";
	require_once ROOT . "DBInterface/languageDB.php";
	require_once ROOT . "DBInterface/articleTranslationDB.php";
	
	if(isset($_POST['action'])){
		if($_POST['action'] == 'add'){
	
				
			$articleDB = new ArticleDB();
			$res = $articleDB->addArticle($_POST['artSystemName'], $_POST['artSystemDescription'], $_POST['artPrice'], $_POST['artImagePath']);
			$resID = $res->fetch_object();
			$artID = $resID->Article_ID;

			saveCategory($artID);
			saveLanguages($artID);
		}
		else if($_POST['action'] == 'update'){
	
			$articleDB = new ArticleDB();
			$artID = $_POST['artId'];
			$res = $articleDB->updateArticle($_POST['artId'], $_POST['artSystemName'], $_POST['artSystemDescription'], $_POST['artPrice'], $_POST['artImagePath']);
			
			saveCategory($artID);
			saveLanguages($artID);
				
		}
		else if($_POST['action'] == 'delete'){
			
			$artID = $_POST['artId'];
			
			deleteArticle($artID);
		
		}
	
	
	}
	
	
	$lang = $_COOKIE ["lang"];
	include ROOT . "resources/$lang.php";
	
	$items = array ();
	$article = null;
	$articleDB = new ArticleDB ();
	
	echo "<table  class=\"basket-table\" border=\"1px\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>$adminArticleId</th>";
	echo "<th>$adminArticleName</th>";
	echo "<th>$adminArticleDescription</th>";
	echo "<th>$adminArticlePrice</th>";
	echo "<th>$adminArticleImage</th>";
	echo "<th>&nbsp;</th>";
	echo "<th>&nbsp;</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	$res = $articleDB->getAllArticles ();
	while ( $items = $res->fetch_object () ) {
		
		$articleId = $items->Article_ID;
		$articleName = $items->ArticleName;
		$articleDescription = $items->ArticleDescription;
		$articlePrice = $items->ArticlePrice;
		$articleImage = $items->ArticleImage;
		
		$article = new article ( $articleId, $articleName, $articlePrice, $articleDescription, $articleImage, null );
		

		echo "<tr>";
		echo "<td>" . $article->getId () . "</td>";
		echo "<td>" . $article->getName () . "</td>";
		echo "<td>" . $article->getDescription () . "</td>";
		echo "<td>" . $article->getPrice () . "</td>";
		echo "<td>" . $article->getImage () . "</td>";
		
		echo "<form action=\"index.php?site=changeArticle\" method=\"get\">";
		echo "<input type=\"hidden\" name=\"artId\" value=\"" . $article->getId () . "\" /input>";
		echo "<input type=\"hidden\" name=\"site\" value=\"changeArticle\" /input>";
		echo "<input type=\"hidden\" name=\"origin\" value=\"update\" /input>";
		echo "<td> <input class=\"basket-update-button\" type=\"submit\" value=\"$adminArticleUpdateLabel\"/></td>";
		echo "</form>";
		echo "<form action=\"index.php?" . $_SERVER ['QUERY_STRING'] . "\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"artId\" value=\"" . $article->getId () . "\" /input>";
		echo "<input type=\"hidden\" name=\"action\" value=\"delete\" /input>";
		echo "<td> <input class=\"basket-delete-button\" name=\"delete\" type=\"submit\" value=\"$adminArticleDeleteLabel\"/></td>";
		echo "</form>";		
		echo "</tr>";
		echo "</form>";
	}
	
	// last line to add a new article
	
	echo "<form action=\"index.php?site=changeArticle\" method=\"get\">";
	// echo "<input type=\"hidden\" name=\"articleId\" value=\"" . $articleId . "\" /input>";
	echo "<tr>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<input type=\"hidden\" name=\"site\" value=\"changeArticle\" /input>";
	echo "<input type=\"hidden\" name=\"origin\" value=\"add\" /input>";
	echo "<td> <input class=\"basket-update-button\"  type=\"submit\" value=\"$adminArticleAddLabel\"/></td>";
	
	echo "</tr>";
	echo "</form>";
	
	echo "</tbody>";
	echo "</table>";
}

function saveCategory($artID){
	require_once ROOT . "DBInterface/categoryArticleDB.php";
	
	$categoryArticleDB = new CategoryArticleDB();
	$categoryArticleDB->deleteAllCategorysByArticle($artID);
	if(isset($_POST['category'])){
		foreach ($_POST['category'] as $catID){
			$categoryArticleDB->insertCategoryArticle($artID, $catID);
		}
	}
}

function saveLanguages($artID){
	require_once ROOT . "DBInterface/languageDB.php";
	require_once ROOT . "DBInterface/articleTranslationDB.php";
	
	$languageDB = new LanguageDB();
	$articleTranslationDB = new ArticleTranslationDB();
	
	$sqllanguageRes = $languageDB->getAllLanguages();
	
	$articleTranslationDB->deleteAllTranslationsByArticle($artID);
	
	while($language = $sqllanguageRes->fetch_object()){
		if(isset($_POST[ $language->Language_ID . "translatedName"]) && isset($_POST[ $language->Language_ID . "translatedDescription"])){
			$translatedName = $_POST[ $language->Language_ID . "translatedName"];
			$translatedDescription = $_POST[ $language->Language_ID . "translatedDescription"];
			$articleTranslationDB->insertCategoryArticle($artID, $language->Language_ID, $translatedName, $translatedDescription);
			
		}
		
	}
	
}

function deleteArticle($artID){

	require_once ROOT . "DBInterface/articleTranslationDB.php";
	require_once ROOT . "DBInterface/categoryArticleDB.php";
	require_once ROOT . "DBInterface/variantDB.php";
	require_once ROOT . "DBInterface/variantTranslationDB.php";
	
	$articleDB = new ArticleDB();
	$articleTranslationDB = new ArticleTranslationDB();
	$categoryArticleDB = new CategoryArticleDB();
	$variantDB = new VariantDB();
	$variantTranslationDB = new VariantTranslationDB();
	
	$articleDB->deleteArticle($artID);
	$articleTranslationDB->deleteAllTranslationsByArticle($artID);
	$categoryArticleDB->deleteAllCategorysByArticle($artID);
	
	$sqlVariantRes = $variantDB->getAllVariantIDsByArticle($artID);
	
	while($variant = $sqlVariantRes->fetch_object()){
		$variantTranslationDB->deleteAllVariantsByArticle($variant->Variation_ID);
	}
	
	$variantDB->deleteAllVariantsByArticle($artID);
	
}

?>