<?php 


class CustomerDB extends mysqli {
	public function getCostomerByID($customerID) {
		$query = "Select * from costumer where Costumer_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $customerID);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}
	


	function __construct() {
		include ROOT . "DBInterface/dbConnectionInfo.php";
		parent::__construct($host, $user, $pass);
		parent::select_db($dbase);
	}
}

?>