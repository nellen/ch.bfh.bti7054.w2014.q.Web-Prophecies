<?php 

class LanguageDB extends mysqli {
	public function getAllLanguages() {
		$query = "Select * from language";
		$statement = $this->prepare($query);
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