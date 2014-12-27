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
		$item .= "<img src=\"./img/user-a.png\" width=\"50px\" height=\"50px\"/>";
		$item .= "<p class=\"article-price\">".$priceLabel.": ". $this->getPrice() . " CHF</p>";
		
		$item .= "<form action=\"index.php?site=basket\" method=\"post\">";
		$item .= "<input type=\"hidden\" name=\"artId\" value=\"". $this->getId(). "\" /input>";
		$item .= "<select name =\"varId\" size=\"1\">";
		$item .= "<option value=\"0\">normal</option>";
		foreach ( $this->getVariants() as $variant ) {
			$item .= "<option value=\"" . $variant->getId() . "\">" . $variant->getName() . " + " . $variant->getPrice() . " CHF</option>";
		}
		
		$item .= "</select>";
		//$item .= "<p id=\"searchDescription\">". $this->getDescription() . "</p>";
		$item .= "<br/>";
		$item .= "<input class=\"article-button\" type=\"submit\" value=\"$basketButtonLabel\"/>";
		$item .= "</form>";
		
		$item .= "</div>";
		
		return $item;
	}
}


?>