<?php 


class VariantDB extends mysqli {
	public function getAllVariantsFromArticle($artId, $lang) {
		$query = "Select V.*, VTR.TranslatedName, VTR.TranslatedDescription from variation As V left join variationtranslation As VTR on V.Variation_ID = VTR.Variation_ID where V.Article_ID = ? and VTR.Language_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("is", $artId, $lang);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}
	
	public function getAllVariantIDsByArticle($artId) {
		$query = "Select Variation_ID from variation  where Article_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $artId);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}
	
	public function deleteAllVariantsByArticle($artID) {
		$query = "delete  from variation where Article_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $artID);
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