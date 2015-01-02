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
	echo "<a href='./index.php'>Back to Login</a>";
}

// This function is reached, when an admin is logged in
function showArticleAdministration() {
	
	require_once ROOT . "includes/items.php";
	require_once ROOT . "DBInterface/articleDB.php";
	
	if(isset($_POST['action'])){
		if($_POST['action'] == 'add'){
	
				
			$articleDB = new ArticleDB();
			$res = $articleDB->addArticle($_POST['artSystemName'], $_POST['artSystemDescription'], $_POST['artPrice'], $_POST['artImagePath']);
			$resID = $res->fetch_object();
			$artID = $resID->Article_ID;
			if(isset($_POST['category'])){
				saveCategory($artID, $_POST['category']);
			}
			else{
				saveCategory($artID, null);
			}
		}
		else if($_POST['action'] == 'update'){
	
			$articleDB = new ArticleDB();
			$artID = $_POST['artId'];
			$res = $articleDB->updateArticle($_POST['artId'], $_POST['artSystemName'], $_POST['artSystemDescription'], $_POST['artPrice'], $_POST['artImagePath']);
			if(isset($_POST['category'])){
				saveCategory($artID, $_POST['category']);
			}
			else{
				saveCategory($artID, null);
			}
				
		}
		else if($_POST['action'] == 'delete'){
		
			$articleDB = new ArticleDB();
			$artID = $_POST['artId'];
			$res = $articleDB->deleteArticle($_POST['artId']);
			$action = 'update';
		
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
	echo "<input type=\"hidden\" name=\"site\" value=\"changeArticle\" /input>";
	echo "<input type=\"hidden\" name=\"origin\" value=\"add\" /input>";
	echo "<td> <input class=\"basket-update-button\"  type=\"submit\" value=\"$adminArticleAddLabel\"/></td>";
	
	echo "</tr>";
	echo "</form>";
	
	echo "</tbody>";
	echo "</table>";
}

function saveCategory($artID, $categorys){
	require_once ROOT . "DBInterface/categoryArticleDB.php";
	
	$categoryArticleDB = new CategoryArticleDB();
	$categoryArticleDB->deleteAllCategorysByArticle($artID);
	if($categorys != null){
		foreach ($categorys as $catID){
			$categoryArticleDB->insertCategoryArticle($artID, $catID);
		}
	}
}

?>