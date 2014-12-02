<?php
/**
 * based on http://stackoverflow.com/questions/21968726/is-it-still-possible-to-get-skypes-user-online-status
 */
/**
 * @version: 1.0 (2014-05-13)
 *
 * @param: String $username             Skype Username
 * @param: [String $lang]               Languagecode (possible values 2014-05-13: "en", "fr", "de","ja", "zh-cn", "zh-tw", "pt", "pt-br", "it", "es", "pl" , "pl"
 * @param: [String $img_time]           Typ im Status Image wich you like to show (Possible values: 2014-05-13: balloon, bigclassic, smallclassic, smallicon, mediumicon, dropdown-white, dropdown-trans)
 *
 * @return array                        "num" = Skype Statuscode, "text" = Statustext (Away" ect.), "img_url" url to Statuscode Image
 */
function getSkypeStatus($username, $lang, $img_type = "smallicon")
{
	$url = "http://mystatus.skype.com/".$username.".xml";
	$data = @file_get_contents($url);

	$status = array();
	if($data === false)
	{
		$status = array("num" =>0,
				"text"=>"http error"
		);
		if(isset($http_response_header)) $status["error_info"] = $http_response_header;
	}
	else
	{
		$pattern = '/xml:lang="NUM">(.*)</';
		preg_match($pattern,$data, $match);

		$status["num"] = $match[1];

		$pattern = '/xml:lang="' . $lang .'">(.*)</';
		preg_match($pattern,$data, $match);

		$status["text"]    = $match[1];
		$status["img_url"] = "http://mystatus.skype.com/".$img_type."/".$username;
	}
	return $status;
}

function getSkypeStatusText($status) 
{
	switch($status["num"])
	{
		case 7:
		case 2: return "is online"; break;
		default: return "is offline or in away state";
	}
}
?>