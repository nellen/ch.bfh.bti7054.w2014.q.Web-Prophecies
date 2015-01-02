<?php 

class ArticleTranslationDB extends mysqli {
	public function getArticletranslation($artID, $lang) {
		$query = "Select * from articletranslation where Article_ID = ? and Language_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("is", $artID,$lang);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}

	public function deleteAllTranslationsByArticle($artID) {
		$query = "delete from articletranslation where Article_ID = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $artID);
		$statement->execute();
		$statement->close();
	}
	
	public function insertCategoryArticle($artID, $lang,$tanslatedName,$translatedDescription) {
		$query = "Insert Into articletranslation (Article_ID, Language_ID,TranslatedName,TranslatedDescription) values (?,?,?,?) ";
		$statement = $this->prepare($query);
		$statement->bind_param("isss", $artID, $lang, $tanslatedName, $translatedDescription);
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