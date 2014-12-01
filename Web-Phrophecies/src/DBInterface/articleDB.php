<?php 


class ArticleDB extends mysqli {
	public function getAllArticlesFromCategory($category, $lang) {
		$query = "Select A.*, ATR.TranslatedName, ATR.TranslatedDescription from article As A left join articletranslation As ATR on A.Article_ID = ATR.Article_ID and ATR.Language_ID = ? left join categoryarticle AS CA on  CA.articleId = A.Article_ID left join category As C ON C.Category_ID = CA.categoryId where C.CategoryName = ? ";
		$statement = $this->prepare($query);
		$statement->bind_param("ss", $lang, $category);
		$statement->execute();
		$res = $statement->get_result();
		$statement->close();
		return $res;
	}
	
	public function getArticleById($artId, $lang) {
		$query = "Select A.*, ATR.TranslatedName, ATR.TranslatedDescription from article As A left join articletranslation As ATR on A.Article_ID = ATR.Article_ID and ATR.Language_ID = ? where A.Article_ID = ? ";
		$statement = $this->prepare($query);
		$statement->bind_param("ss", $lang, $artId);
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