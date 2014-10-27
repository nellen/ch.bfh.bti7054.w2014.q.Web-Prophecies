<?php
class menuController {
	
	const XSD_PATH = "./menus.xsd";
	const MENU_NAME_ATTR = "menuName";
	private $xmlDom;
	private $sxmlIter;
	
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
			throw new Exception("Failed to load the XML-File. Check your filepath " . 
					"and/or your XML-File");
		}
		
		// Validation
		if (! $this->xmlDom->schemaValidate ( self::XSD_PATH )) {
			throw new Exception ("Validation failure. Please check your XML-Structure against menus.xsd");
		}
		// create the SimpleXMLIterator an unset the xmlDom because it now usless
		$this->sxmlIter = new SimpleXMLIterator ( $xmlFilepath, 0, true);
		unset ( $this->xmlDom );
	}
	
	
	/**
	 * Returns the HTML-Code for the requested menu, defined by <code>menuName</code>
	 * 
	 * @param string $menuName The menu name for which the HTML-Code will returned
	 * @throws Exception in case the input paramenter <code>menuName</code> is not a String
	 * @return string which contains the HTML-Code for the menu
	 */
	public function getHtmlMenu($menuName) {
		try {
			// rewinds the SimpleXMLIterator to the first element
			$this->sxmlIter->rewind();
			
			// Check the input if it is a String else -> Exception
			if (is_string ( $menuName )) {
				self::getMenuNode($menuName);
				// now the menu will be builded
				$htmlMenu = "<ul>" . "\n";
				$htmlMenu .= self::getHtmlMenuContent($this->sxmlIter->getChildren());
				$htmlMenu .= "</ul>";
				return $htmlMenu;
			} else {
				throw new Exception ( "Your function parameter was an " .
						strtoupper ( gettype ( $menuName ) ) . " instead of " .
						strtoupper ( gettype ( "a" ) ) );
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
		
	}
	
	/**
	 * Builds the HTML list elements. It's possible that the given <code>node</code>
	 * has sub menus. In this case, the function will call itselfs (recursive) to generate a
	 * inner unordered list.
	 * 
	 * @param object $nodes Contains the elements which should be listed in the unordered list
	 * @return string which contains the HTML-Code for the elements in a unordered list
	 */
	private function getHtmlMenuContent($nodes){
		$htmlStr ="";
		foreach ($nodes as $liNode){
			if($liNode->subMenu){
				$htmlStr .= '<li><a href="' . $liNode->link . '">'
						. $liNode->text . '</a>' . "\n" . '<ul>' . "\n";
				$htmlStr .= self::getHtmlMenuContent($liNode->subMenu->subItem);
				$htmlStr .= "</ul>\n</li>" . "\n";
			} else {
				$htmlStr .= '<li><a href="' . $liNode->link . '">'
						. $liNode->text . '</a></li>' . "\n";
			}
		}
		return $htmlStr;
	}
	
	/**
	 * Sets the SimpleXMLIterator to the XML-Tag where <code>menuName</code> matches the
	 * attribute value of the attribute identifier called menuName.
	 * 
	 * @param string $menuName The <code>menuName</code> which will be builded
	 * @throws Exception in case there is no such named menu in the XML document
	 */
	private function getMenuNode($menuName){
		if($this->sxmlIter->current() != NULL){
			if(self::checkAttributeTag($this->sxmlIter->current(), self::MENU_NAME_ATTR, $menuName)){
				return;
			} else {
				$this->sxmlIter->next();
				self::getMenuNode($menuName);
			}
		} else {
			throw new Exception ( "There is no such named menu. " . 
					"Please check your spelling and/or your XML" );
		}
	}
	
	/**
	 * Compare the attribute identifier <code>attributeId</code> with the
	 * <code>attributeValue</code> of the given <code>node</code>.<p>
	 * Returns true if the <code>attributeValue</code> matches the value of
	 * <code>attributeId</code>.
	 * 
	 * @param SimpleXMLElement $node The element which should have the attribute
	 * @param string $attributeId The attribute identifier
	 * @param string $attributeValue The attribute value
	 * @return boolean True, if <code>attributeValue</code> matches the value of
	 * 			<code>attributeId</code>
	 */
	private function checkAttributeTag($node, $attributeId, $attributeValue){
		if($node->attributes()->$attributeId == $attributeValue){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

$myMenu = new menuController ( "./menus.xml" );
$menu = $myMenu->getHtmlMenu ( "userMenu" );
echo $menu;

?>