<?php 

class VariantTranslationDB extends mysqli {

	
	public function deleteAllVariantsByArticle($varID) {
		$query = "delete  from variationtranslation where Variation_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $varID);
		$statement->execute();
		$statement->close();
	}

	function __construct() {
		include ROOT . "DBInterface/dbConnectionInfo.php";
		parent::__construct($host, $user, $pass);
		parent::select_db($dbase);
	}
}

?>