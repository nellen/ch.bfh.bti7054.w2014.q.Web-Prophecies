<?php 
class articleVariant {
	private $varId;
	private $name;
	private $price;

	function __construct($varId, $name, $price) {
		$this->varId = $varId;
		$this->name = $name;
		$this->price = $price;
	}
	

	public function getId() {
		return $this->varId;
	}
	
	public function setId($varId) {
		$this->varId = $varId;
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
	
	
}