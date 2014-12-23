<?php 

class loginDB extends mysqli {
	
	public function getAccount($username) {
		$query = "SELECT Username, Password, Role_ID, Costumer_ID FROM webshop.user WHERE username = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("s", $username);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}
	
	function __construct() {
		include "../DBInterface/dbConnectionInfo.php";
		parent::__construct($host, $user, $pass);
		parent::select_db($dbase);
	}
	
}

?>