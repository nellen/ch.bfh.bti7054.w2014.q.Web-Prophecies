<?php 
class Customer {
	private $customerId;
	private $registerDate;
	private $gender;
	private $title;
	private $firstname;
	private $lastname;
	private $birthday;
	private $phoneNumber;
	private $mobilePhone;
	private $email;
	private $billingAddress;
	private $shippingAddress;

	function __construct($customerId, $registerDate, $gender, $title, $firstname, $lastname, $birthday, $phoneNumber, $mobilePhone, $email, $billingAddress, $shippingAddress) {
		$this->customerId = $customerId;
		$this->registerDate = $registerDate;
		$this->gender = $gender;
		$this->title = $title;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->birthday = $birthday;
		$this->phoneNumber = $phoneNumber;
		$this->mobilePhone = $mobilePhone;
		$this->email = $email;
		$this->billingAddress = $billingAddress;
		$this->shippingAddress = $shippingAddress;
	}
	

	public function getId() {
		return $this->customerId;
	}
	
	public function setId($customerId) {
		$this->customerId = $customerId;
	}
	
	public function getRegisterDate() {
		return $this->registerDate;
	}
	
	public function setRegisterDate($registerDate) {
		$this->registerDate = $registerDate;
	}
	
	public function getGender() {
		return $this->gender;
	}
	
	public function setGender($gender) {
		$this->gender = $gender;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function getFirstname() {
		return $this->firstname;
	}
	
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}
	
	public function getLastname() {
		return $this->lastname;
	}
	
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}
	
	public function getBirthday() {
		return $this->birthday;
	}
	
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}
	
	public function getPhoneNumber() {
		return $this->phoneNumber;
	}
	
	public function setPhoneNumber($phoneNumber) {
		$this->phoneNumber = $phoneNumber;
	}
	
	public function getMobilePhone() {
		return $this->lastname;
	}
	
	public function setMobilePhone($mobilePhone) {
		$this->mobilePhone = $mobilePhone;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getBillingAddress() {
		return $this->billingAddress;
	}
	
	public function setBillingAddress($billingAddress) {
		$this->billingAddress = $billingAddress;
	}
	
	public function getShippingAddress() {
		return $this->shippingAddress;
	}
	
	public function setShippingAddress($shippingAddress) {
		$this->shippingAddress = $shippingAddress;
	}
	

}