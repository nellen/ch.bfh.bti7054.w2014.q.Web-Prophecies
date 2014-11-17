<?php

require './includes/langController.php';

class menuController {
	
	const XSD_PATH = "./includes/menus.xsd";
	const LINK_STR = "./index.php?site=";
	private $xmlDom;
	private $sxmlIter;
	private $cssStyle;
	private $menuArray = array();
	private $breadcrumb = "<ul>";
	
	private $isFound = False;
	
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
			$this->xmlDom->load ( $xmlFilepath );
		} else {
			throw new Exception("Failed to load the XML-File from $xmlFilepath ->" .
					" Check your filepath and/or your XML-File.");
		}
		
		// Validation
		if (! $this->xmlDom->schemaValidate ( self::XSD_PATH )) {
			throw new Exception ("Validation failure. Please check your XML-Structure against menus.xsd");
		}
		// create the SimpleXMLIterator an unset the xmlDom because it now usless
		$this->sxmlIter = new SimpleXMLIterator ( $xmlFilepath, 0, true);
		unset ( $this->xmlDom );
		
		self::xml2array();
	}
	
	private function xml2array(){ //<-------------- must be changed to private
		$this->sxmlIter->rewind();
		while($this->sxmlIter->hasChildren()){
			self::menu2array($this->sxmlIter->current());
			$this->sxmlIter->next();
		}
		return $this->menuArray;
	}
	
	private function menu2array($menu){
		$this->menuArray[(string)$menu->attributes()->menuName] = self::getMenuItems($menu);
	}
	
	private function getMenuItems($menu){
		$menuItems = array();
		foreach($menu->menuItem as $item){
			$menuItems[(string)$item->attributes()->itemName] = self::getMenuItemElements($item);
		}
		return $menuItems;
	}
	
	private function getMenuItemElements($item){
		$elements = array();
		if($item->category){
			$elements["category"] = (string)$item->category;
		}
		$elements["text"] = (string)$item->text;
		$elements["siteName"] = (string)$item->siteName;
		$elements["enabled"] = (int)$item->enabled;
		if ($item->subMenu->menuItem != NULL){
			$elements["subMenu"] = self::getMenuItems($item->subMenu);
		} else {
			$elements["subMenu"] = array();
		} 
		return $elements;
	}
	
	public function printMenu($menuName, $isSubMenu=FALSE){
		$output = "";
		$indent = "\t";
		if (!$isSubMenu){
			$menu = $this->menuArray[$menuName];
			$output .= $menuName . "\n";
		} else {
			$indent .= "\t";
			$menu = $menuName;
		}
		foreach ($menu as $menuItem){
			$output .= $indent . "-> " . $menuItem["text"] . "\n";
			if (count($menuItem["subMenu"]) != 0){
				$output .= self::printMenu($menuItem["subMenu"], TRUE);
			}
		}
		echo $output;
	}
	
	public function getHtmlMenu($menuName, $cssStyle="") {
		try {
			// Check the input if it is a String else -> Exception
			if (!is_string ( $menuName )) {
				throw new Exception ( "The first function parameter {menuName: $menuName}" .
						"is not a String ");
			}
			$this->cssStyle = $cssStyle;
			$htmlMenu = "";
			$htmlMenu = '<ul class="' . $this->cssStyle . '">' . "\n";
			$menu = $this->menuArray[$menuName];
			foreach ($menu as $keyIndex => $menuItem){
				$htmlMenu .= self::getHtmlMenuContent($menuItem, $keyIndex);
			}
			$htmlMenu .= "</ul>";
			echo $htmlMenu;
		} catch (Exception $e) {
			echo "Oops! Something went wrong.<br />";
			echo "Message: " . $e->getMessage() . "<br />";
			echo "Source: " . $e->getFile() . "<br />";
			echo "On line: " . $e->getLine();
		}
	}
	
	private function getHtmlMenuContent($menuItem, $keyIndex){
		$htmlStr ="";
		if(count($menuItem["subMenu"]) != 0){
			$htmlStr .= '<li><a href="'. self::LINK_STR . $menuItem["siteName"] .
						'&lang=' . get_language() . '">' . get_localization($keyIndex) . 
						"</a>\n" . '<ul class="' . $this->cssStyle . '">';
			foreach ($menuItem["subMenu"] as $key => $subItem){
				$htmlStr .= self::getHtmlMenuContent($subItem, $key);
			}
			$htmlStr .= "</ul>\n</li>";
		} else {
			$htmlStr .= self::createLink($menuItem, $keyIndex);
		}
		return $htmlStr;
	}
	
	private function createLink($itemToLink, $keyIndex){
		if(isset($itemToLink["category"])){
			return '<li><a href="' . self::LINK_STR . $itemToLink["siteName"] .
			'&category=' . $itemToLink["category"] . '&lang=' . get_language() .
			'">' . get_localization($keyIndex) . '</a></li>' . "\n";
		} else {
			return '<li><a href="' . self::LINK_STR . $itemToLink["siteName"] .
			'&lang=' . get_language() . '">' . get_localization($keyIndex) . '</a></li>' . "\n";
		}
		
	}
	
	public function createBreadcrumb($path){
		$homebase = self::searchItemByKey($this->menuArray, "home");
 		$this->breadcrumb .= self::createLink($homebase[key($homebase)], key($homebase));
		$parts = explode('?',$path);
		if (strpos($parts[1], "&") !== false){
			$phpInfo = explode('&', $parts[1]);
		} else {
			$phpInfo = $parts[1];
		}
		
		$site=NULL;
		foreach ($phpInfo as $crumb){
			if (strpos($crumb, "site") !== false){
				$bla = explode('=', $crumb);
				if($bla[1] != "main"){
					$site = self::searchItemByKey($this->menuArray, $bla[1]);
					$this->breadcrumb .= self::createLink($site[key($site)], key($site));
				}
			}
			if (strpos($crumb, "category") !== false){
				$bla = explode('=', $crumb);
				$category = self::searchItemByKey($site, $bla[1]);
				$this->breadcrumb .= self::createLink($category[key($category)], key($category));
			}
		}
		$this->breadcrumb .= "</ul>";
		echo $this->breadcrumb;
	}
	
	public function searchItemByKey($arrayInput, $key){
			$result = array();
			self::search_r($arrayInput, $key, $result);
			return $result;
	}
	
	private function search_r($array, $key, &$result){
		if (!is_array($array)) {
			return;
		}
		foreach ($array as $subKey => $content){
			if($key == $subKey){
				$result[$subKey] = $content;
				break;
			}
				self::search_r($content, $key, $result);
		}
	}
}


//$myMenu = new menuController("./menus.xml");
//$huhu = $myMenu->xml2array();
//echo $myMenu->printMenu("mainMenu");
//$myMenu->getHtmlMenu("mainMenu", "sidebarlist");
//var_dump($huhu["mainMenu"]);
//$myMenu->createBreadcrumb("http://localhost/breakfast/index.php?site=shop&category=food");
// $shop = $myMenu->searchItemByKey($huhu, "shop");
// $beverage = $myMenu->searchItemByKey($shop, "beverage");
// var_dump($beverage);

?>