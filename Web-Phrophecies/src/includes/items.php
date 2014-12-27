<?php

require_once ROOT . "DBInterface/articleDB.php";
require_once ROOT . "DBInterface/variantDB.php";

function getCategoryItems ($categoryName, $lang) {

	$items = array();

	$articleDB = new ArticleDB();
	$variantDB = new VariantDB(); 
	
	$res = $articleDB->getAllArticlesFromCategory($categoryName, $lang);
	while($item = $res->fetch_object()){
		
		$itemName = $item->ArticleName;
		if($item->TranslatedName != null){
			$itemName = $item->TranslatedName;
		}
		$itemDescription = $item->ArticleDescription;
		if($item->TranslatedName != null){
			$itemDescription = $item->TranslatedDescription;
		}
		
		$varRes =$variantDB->getAllVariantsFromArticle($item->Article_ID, $lang);
		$variants = array();
		while($variant = $varRes->fetch_object()){
		
			$variantName = $variant->VariationName;
			if($variant->TranslatedName != null){
				$variantName = $variant->TranslatedName;
			}
			$variantDescription = $variant->VariationDescription;
			if($variant->TranslatedName != null){
				$variantDescription = $variant->TranslatedDescription;
			}
		
		
			$variants[] = new articleVariant($variant->Variation_ID, $variantName, $variant->VariationPrice);
		
		}
		
		$items[] = new article($item->Article_ID,$itemName, $item->ArticlePrice, $itemDescription, "./img/user-a.png",$variants);
		
	}
	
	return $items; 
}

function getItem ($artId, $lang) {
	$articleDB = new ArticleDB();
	$variantDB = new VariantDB();
	$res = $articleDB->getArticleById($artId, $lang);
	$itemRes = $res->fetch_object();
	$itemName = $itemRes->ArticleName;
	if($itemRes->TranslatedName != null){
		$itemName = $itemRes->TranslatedName;
	}
	$itemDescription = $itemRes->ArticleDescription;
	if($itemRes->TranslatedName != null){
		$itemDescription = $itemRes->TranslatedDescription;
	}
	
	$varRes =$variantDB->getAllVariantsFromArticle($itemRes->Article_ID, $lang);
	$variants = array();
	while($variant = $varRes->fetch_object()){
	
		$variantName = $variant->VariationName;
		if($variant->TranslatedName != null){
			$variantName = $variant->TranslatedName;
		}
		$variantDescription = $variant->VariationDescription;
		if($variant->TranslatedName != null){
			$variantDescription = $variant->TranslatedDescription;
		}
	
	
		$variants[] = new articleVariant($variant->Variation_ID, $variantName, $variant->VariationPrice);
	
	}

	$item = new article($itemRes->Article_ID,$itemName, $itemRes->ArticlePrice, $itemDescription, "./img/user-a.png",$variants);
	return $item;
	
}
	
function getItemByKeyword ($keyword, $lang) {
	$articleDB = new ArticleDB();
	$variantDB = new VariantDB();
	$res = $articleDB->getArticleByKeyword($keyword, $lang);
	$items = array();
	while($itemRes = $res->fetch_object()){
		$itemName = $itemRes->ArticleName;
		if($itemRes->TranslatedName != null){
			$itemName = $itemRes->TranslatedName;
		}
		$itemDescription = $itemRes->ArticleDescription;
		if($itemRes->TranslatedName != null){
			$itemDescription = $itemRes->TranslatedDescription;
		}
	
		$varRes =$variantDB->getAllVariantsFromArticle($itemRes->Article_ID, $lang);
		$variants = array();
		while($variant = $varRes->fetch_object()){
	
			$variantName = $variant->VariationName;
			if($variant->TranslatedName != null){
				$variantName = $variant->TranslatedName;
			}
			$variantDescription = $variant->VariationDescription;
			if($variant->TranslatedName != null){
				$variantDescription = $variant->TranslatedDescription;
			}
			
			$variants[] = new articleVariant($variant->Variation_ID, $variantName, $variant->VariationPrice);
		}
	
		$items[] = new article($itemRes->Article_ID,$itemName, $itemRes->ArticlePrice, $itemDescription, "./img/user-a.png",$variants);
	}
	return $items;
}
	


?>