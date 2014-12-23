<?php 
class user {
	private $username;
	private $password;
	private $roleId;
	private $costumerId;

	function __construct($username) {
		$this->username = $username;
	}


	public function getUsername() {
		return $this->username;
	}
	
	public function setUsername($username) {
		$this->username = $username;
	}

	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function getRoleId() {
		return $this->roleId;
	}
	
	public function setRoleId($roleId) {
		$this->roleId = $roleId;
	}
	
	public function getCostumerId() {
		return $this->costumerId;
	}
	
	public function setCostumerId($costumerId) {
		$this->costumerId = $costumerId;
	}
}


?>