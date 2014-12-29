<?php 


class AddressDB extends mysqli {
	public function getAddressByID($adrID) {
		$query = "Select * from address where Address_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $adrID);
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