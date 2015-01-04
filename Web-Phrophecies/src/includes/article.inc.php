<?php 
class article {
	private $artId;
	private $name;
	private $price;
	private $description;
	private $image;
	private $variants = array();

	function __construct($artId, $name, $price, $description, $image, $variants) {
		$this->artId = $artId;
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
		$this->image = $image;
		$this->variants = $variants;
	}
	

	public function getId() {
		return $this->artId;
	}
	
	public function setId($artId) {
		$this->artId = $artId;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getPrice() {
		return $this->price;
	}
	
	public function setPrice($price) {
		$this->price = $price;
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function setDescription($description) {
		$this->description = $description;
	}
	
	public function getImage() {
		return $this->image;
	}
	
	public function setImage($image) {
		$this->image = $image;
	}
	
	public function getVariants() {
		return $this->variants;
	}
	
	public function setVariants($variants) {
		$this->variants = $variants;
	}
	
	public function getPriceWithVariant($varId) {
		$calcPrice = $this->price;
		foreach ( $this->getVariants() as $variant ) {
			if($varId == $variant->getId()){
				$calcPrice += $variant->getPrice();
				break;
			}
		}
		
		return $calcPrice;
	}
	
	public function getVariantName($varId) {
		$variantname = "normal";
		foreach ( $this->getVariants() as $variant ) {
			if($varId == $variant->getId()){
				$variantname = $variant->getName();
				break;
			}
		}
	
		return $variantname;
	}
	
	public function getSearchView(){
		include_once ROOT . "includes/functions.php";
		$lang = get_language();
		require ROOT . "resources/".$lang.".php";
		
		$item = "<div class=\"article\" title='" . $this->getDescription() . "'>";
		$item .= "<h2>". $this->getName() . "</h2>";
		$item .= "<img src=\"" . $this->getImage() . "\"/>";
		$item .= "<p class=\"article-price\">".$priceLabel.": ". formatPrice($this->getPrice()) . " CHF</p>";
		
		$item .= "<form action=\"index.php?site=basket\" method=\"post\">";
		$item .= "<input type=\"hidden\" name=\"artId\" value=\"". $this->getId(). "\" /input>";
		$item .= "<select name =\"varId\" size=\"1\">";
		$item .= "<option value=\"0\">normal</option>";
		foreach ( $this->getVariants() as $variant ) {
			if($variant->getPrice() >= 0){
				$sign = " +";
			} else {
				$sign = " ";
			}
			$item .= "<option value=\"" . $variant->getId() . "\">" . $variant->getName() . $sign . formatPrice($variant->getPrice()) . " CHF</option>";
		}
		
		$item .= "</select>";
		$item .= "<br/>";
		$item .= "<input class=\"article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
		$item .= "</form>";
		
		$item .= "</div>";
		
		return $item;
	}
	
	public function getArticleView($lang){
		
		require ROOT . "resources/".$lang.".php";
		
		$itemHtml = "<div class=\"article\">";
		$itemHtml .= "<h1>". $this->getName() . "</h1>";
		$itemHtml .= "<img src=\"" . $this->getImage() . "\"/>";
		$itemHtml .= "<p class=\"article-price\">".$priceLabel.": ". formatPrice($this->getPrice()) . " CHF</p>";
		
		$itemHtml .= "<form action=\"index.php?site=basket\" method=\"post\">";
		$itemHtml .= "<input type=\"hidden\" name=\"artId\" value=\"". $this->getId(). "\" /input>";
		$itemHtml .= "<select name =\"varId\" size=\"1\">";
		$itemHtml .= "<option value=\"0\">normal</option>";
		foreach ( $this->getVariants() as $variant ) {
			if($variant->getPrice() >= 0){
				$sign = " +";
			} else {
				$sign = " ";
			}
			$itemHtml .=  "<option value=\"" . $variant->getId() . "\">" . $variant->getName() . $sign . formatPrice($variant->getPrice()) . " CHF</option>";
		}
		
		$itemHtml .=  "</select>";
		$itemHtml .=  "<p>". $this->getDescription() . "</p>";
		$itemHtml .=  "<br/>";
		$itemHtml .=  "<input class=\"article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
		$itemHtml .=  "</form>";
		
		$itemHtml .=  "</div>";
		return $itemHtml;
	}
	
	public function getListView($lang){
		require ROOT . "resources/".$lang.".php";
		$itemHtml = "<div class=\"list-article\">";
		$itemHtml .= "<img src=\"" . $this->getImage() . "\" width=\"100px\" height=\"100px\"/>";
		$itemHtml .=  "<h2>" . $this->getName() . "</h2>";
		$itemHtml .=  "<p class=\"list-article-price\">$priceLabel: " . formatPrice($this->getPrice()) . " CHF</p>";
		if(count($this->getVariants()) > 0){
			$itemHtml .=  "<p class=\"list-article-variation\">$variationsLabel:";
			$firstElement = TRUE;
			foreach ( $this ->getVariants() as $variant ) {
				if ($firstElement) {
					$firstElement = FALSE;
				} else {
					$itemHtml .=  ",";
				}
				if($variant->getPrice() >= 0){
					$sign = " +";
				} else {
					$sign = " ";
				}
			$itemHtml .=  " " . $variant->getName() . $sign . formatPrice($variant->getPrice()) . " CHF";
			}
			$itemHtml .=  "</p>";
		}
		
		$itemHtml .=  "<p>" . $this->getDescription() . "</p>";
		$itemHtml .=  "<form action=\"index.php\" method=\"get\">";
		$itemHtml .=  "<input type=\"hidden\" name=\"site\" value=\"article\" /input>";
		$itemHtml .= "<input type=\"hidden\" name=\"lang\" value=\"". $lang. "\" /input>";
		$itemHtml .= "<input type=\"hidden\" name=\"artId\" value=\"". $this->getId(). "\" /input>";
		$itemHtml .= "<input class=\"list-article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
		$itemHtml .= "</form>";
		$itemHtml .= "</div>";
		
		return $itemHtml;
		
	}
}


?>