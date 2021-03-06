<?php


class menuController {
	
	const XSD_PATH = "./resources/xml/menus.xsd";
	const LINK_STR = "./index.php?site=";
	private $xmlDom;
	private $cssStyle;

	
	/**
	 * Checks if the XML-File given by the <code>xmlFilePath</code> exist and validate
	 * it against the "menus.xsd" schema.
	 * Set up a SimpleXMLIterator for the XML-File.
	 * 
	 * @param string $xmlFilepath The filepath where the XML-File is located
	 * @throws Exception if the XML-File can not be loaded
	 * @throws Exception if validation failed
	 */
	function __construct($xmlFilepath) {
		if (file_exists ( $xmlFilepath )) {
			// load the file as DOMDocument to ensure that is XML
			$this->xmlDom = new DOMDocument ();
			$this->xmlDom->preserveWhiteSpace = FALSE;
			$this->xmlDom->load ( $xmlFilepath );
		} else {
			throw new Exception("Failed to load the XML-File from $xmlFilepath ->" .
					" Check your filepath and/or your XML-File.");
		}
		
		// Validation
		if (! $this->xmlDom->schemaValidate ( self::XSD_PATH )) {
			throw new Exception ("Validation failure. Please check your XML-Structure against menus.xsd");
		}
	}
	
	
	public function createHtmlMenu($menuName, $cssStyle){
		try {
			// Check the input if it is a String else -> Exception
			if (!is_string ( $menuName )) {
				throw new Exception ( "The first function parameter {menuName: $menuName}" .
						"is not a String ");
			}
			$this->cssStyle = $cssStyle;
			$menuNode = $this->getMenuNode($menuName);
			$htmlMenu = '<ul class="' . $this->cssStyle . '">' . "\n";
			$htmlMenu .= $this->getHtmlMenuContent($menuNode);
			$htmlMenu .= "</ul>";
			echo $htmlMenu;
		} catch (Exception $e) {
			echo "Oops! Something went wrong.<br />";
			echo "Message: " . $e->getMessage() . "<br />";
			echo "Source: " . $e->getFile() . "<br />";
			echo "On line: " . $e->getLine();
		}
	}
	
	private function getMenuNode($menuName){
		$menus = $this->xmlDom->getElementsByTagName("menu");
		// TODO what happens if the menu is not found??
		foreach ($menus as $menu){
			if($menu->getAttribute("menuName") == $menuName){
				return $menu;
			}
		}
	}
	
	private function getHtmlMenuContent($menuNode, $inSubMenu=FALSE){
		$htmlStr = "";
		$menuItem = $menuNode->firstChild;
		while($menuItem != NULL){
			if($this->hasSubMenu($menuItem)){
				$htmlStr .= $this->createLink($menuItem, TRUE);
				$subMenuItem = $menuItem->getElementsByTagName("subMenu")->item(0);
				$htmlStr .= $this->getHtmlMenuContent($subMenuItem,TRUE);
				$htmlStr .= "</ul>\n</li>\n";
			} else if($inSubMenu) {
				$htmlStr .= $this->createLink($menuItem);
			} else {
				$htmlStr .= $this->createLink($menuItem);
			}
			$menuItem = $menuItem->nextSibling;
		}
 		return $htmlStr;
	}
	
	private function hasSubMenu($node){
		if($node->getElementsByTagName("subMenu")->length != 0){
			return true;
		} else {
			return false;
		}
	}
	// hint onmouseover="alert(' ."'toll'" . ');"
	private function createLink($nodeToLink, $forOpeningSubMenu=FALSE){
		if($forOpeningSubMenu && !($nodeToLink->firstChild->tagName == "category")){
			$id = $nodeToLink->getElementsByTagName("subMenu")->item(0)->getAttribute("menuId");
			return '<li><a href="' . self::LINK_STR . $this->getNodeValue($nodeToLink, "siteName") .
			'" onmouseover="' . "openMenu('$id');" . '" onmouseout="' . "closeMenu('$id');" . '" onclick="' . "showMenu('$id');" . '">' . get_localization($nodeToLink->getAttribute("itemName")) . '</a>' . "\n" .
			'<ul class="' . $this->cssStyle . '"id="' . $id . '"onmouseover="' . "openMenu('$id');" . '" onmouseout="' . "closeMenu('$id');" . '" onclick="' . "showMenu('$id');" . '">' . "\n";
			
		} else if($forOpeningSubMenu && ($nodeToLink->firstChild->tagName == "category")){
			var_dump($nodeToLink->parentNode->tagName);
			return '<li><a href="' . self::LINK_STR . $this->getNodeValue($nodeToLink, "siteName") .
			'&category=' . $this->getNodeValue($nodeToLink, "category") .'" onmouseover="' . "openMenu();" . '" onmouseout="' . "closeMenu();" . '">' .
			get_localization($nodeToLink->getAttribute("itemName")) . '</a>' . "\n" .
			'<ul class="' . $this->cssStyle . '"id="dropdown">' . "\n";
			
		} else if ($nodeToLink->firstChild->tagName == "category"){
			
			return '<li><a href="' . self::LINK_STR . $this->getNodeValue($nodeToLink, "siteName") .
			'&category=' . $this->getNodeValue($nodeToLink, "category") . '">' .
			get_localization($nodeToLink->getAttribute("itemName")) . '</a></li>' . "\n";
			
		} else {
			
			return '<li><a href="' . self::LINK_STR . $this->getNodeValue($nodeToLink, "siteName") .
			'">' . get_localization($nodeToLink->getAttribute("itemName")) . '</a></li>' . "\n";
			
		}
	}
	
	private function getNodeValue($parentNode, $nodeTag){
		return $parentNode->getElementsByTagName($nodeTag)->item(0)->nodeValue;
	}
	
	public function getBreadcrumb($site, $category=NULL){
		$location = $this->getLocation($site, $category);
		if ($site == 'article'){
			$site = "shop";
			$location = $this->getLocation($site, $category);
		}
		else if ($location == ''){
			$site = "main";
			$location = $this->getLocation($site, $category);
		}
		$node = $this->xmlDom->getElementById($location);
		if($node->getAttribute("itemName") == "home"){
			echo "<ul>" . $this->createLink($node) . "</ul>";
		} else {
			$breadcrumb = "<ul>";
			$breadcrumb .= $this->createLink($this->xmlDom->getElementById("home"));
			$breadcrumb .= $this->createBreadcrumb($node);
			$breadcrumb .= "</ul>";
			echo $breadcrumb;
		}
	}
	
	private function createBreadcrumb($node, $crumbs=""){
		if($node->parentNode->tagName == "menu"){
			return $crumbs = "<li> &gt; </li>" . $this->createLink($node) . $crumbs;
		} else {
 			$crumb = "<li> &gt; </li>" . $this->createLink($node) . $crumbs;
 			return $this->createBreadcrumb($node->parentNode->parentNode, $crumb);
 		}
	}
	
	private function getLocation($site, $category=NULL){
		$location = "";
		$nodes = $this->xmlDom->getElementsByTagName("menuItem");
		foreach ($nodes as $node){
			if(isset($category) && $node->firstChild->nodeValue == $category){
				$location = $node->getAttribute("itemName");
			} else {
				if ($this->getNodeValue($node, "siteName") == $site && $node->firstChild->nodeName != "category"){
					$location = $node->getAttribute("itemName");
				}
			}
		}
		return $location;
	}
}
	
//	$myMenu = new menuController("./menus.xml");
//	$theMenu = $myMenu->createHtmlMenu("mainMenu", "sidebarlist");

 	
 //	$myMenu->creatBreadcrumb("http://localhost/breakfast/index.php?site=shop&category=food")
// 	$other = $myMenu->getMenuNode("mainMenu");
// 	$otherItem = $other->firstChild;
// 	echo $otherItem->nodeValue;

// 	$otherItem = $otherItem->nextSibling;

//	$menus = $myMenu->xmlDom->firstChild->firstChild;
// 	echo "\n";
// 	echo "\n";
// 	echo $myMenu->getBreadcrumb("article", "foodfood");
?>