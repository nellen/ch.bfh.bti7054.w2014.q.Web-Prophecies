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
}


?>