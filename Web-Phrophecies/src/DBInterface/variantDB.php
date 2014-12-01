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
	

	function __construct() {
		include "./DBInterface/dbConnectionInfo.php";
		parent::__construct($host, $user, $pass);
		parent::select_db($dbase);
	}
}

?>