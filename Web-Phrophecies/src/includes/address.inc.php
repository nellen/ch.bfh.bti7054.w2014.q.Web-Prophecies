<?php 
class Address {
	private $adrId;
	private $address1;
	private $address2;
	private $zip;
	private $city;
	private $country;

	function __construct($adrId, $address1, $address2, $zip, $city, $country) {
		$this->adrId = $adrId;
		$this->address1 = $address1;
		$this->address2 = $address2;
		$this->zip = $zip;
		$this->city = $city;
		$this->country = $country;
	}
	

	public function getId() {
		return $this->adrId;
	}
	
	public function setId($adrId) {
		$this->adrId = $adrId;
	}
	
	public function getAddress1() {
		return $this->address1;
	}
	
	public function setAddress1($address1) {
		$this->address1 = $address1;
	}
	
	public function getAddress2() {
		return $this->address2;
	}
	
	public function setAddress2($address2) {
		$this->address2 = $address2;
	}
	
	public function getZip() {
		return $this->zip;
	}
	
	public function setZip($zip) {
		$this->zip = $zip;
	}
	
	public function getCity() {
		return $this->city;
	}
	
	public function setCity($City) {
		$this->city = $city;
	}
	
	public function getCountry() {
		return $this->country;
	}
	
	public function setCountry($country) {
		$this->country = $country;
	}
	
	

}


?>