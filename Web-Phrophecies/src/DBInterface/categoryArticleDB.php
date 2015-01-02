<?php 

class CategoryArticleDB extends mysqli {
	public function getAllCategorysByArticle($artID) {
		$query = "Select * from categoryarticle where articleId = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $artID);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}

	public function deleteAllCategorysByArticle($artID) {
		$query = "delete  from categoryarticle where articleId = ?";
		$statement = $this->prepare($query);
		$statement->bind_param("i", $artID);
		$statement->execute();
		$statement->close();
	}
	
	public function insertCategoryArticle($artID, $catId) {
		$query = "Insert Into categoryarticle (categoryId, articleId) values (?,?)";
		$statement = $this->prepare($query);
		$statement->bind_param("ii", $catId,$artID);
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