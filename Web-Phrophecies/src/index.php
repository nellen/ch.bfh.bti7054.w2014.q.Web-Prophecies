<?php
include_once("config.php");
$time = time () + 60 * 60 * 24 * 30; // expires in 30 days
if (isset ( $_POST ["lang"] )) {
	setcookie ( "lang", $_POST ["lang"], $time );
	$_COOKIE ["lang"] = $_POST ["lang"];
} else if (! isset ( $_COOKIE ["lang"] )) {
	setcookie ( "lang", "en", $time );
}
session_start (); // create or recover session,
function __autoload($class_name) {
	require_once(ROOT . "includes/".$class_name.".inc.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>The BreakFast Company</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/layout.css" type="text/css" />
<link rel="stylesheet" href="./css/format.css" type="text/css" />
<script type="text/javascript" src="./resources/js/menu.js"></script>
<script type="text/javascript" src="./resources/js/productSearch.js"></script>
<?php
require_once './includes/langController.php';
include_once "./includes/functions.php";
$menu = new menuController ( "./resources/xml/menus.xml" );

?>
</head>

<body>
	<div id="wrapper">
		<div id="banner-area">
			<img src="./img/BreakFast-Logo-white.png" width="100%" />
			<!-- <h2>The</h2><h1>BreakFast</h1><h2>Company</h2>
		<h3>Start your day with a smile!</h3>  -->
		</div>
		<div id="breadcrumps-area">
			<div id="breadcrumps">
				<p>
					<?php
					$menu->getBreadcrumb ( get_site (), get_category () );
					?>
				</p>
			</div>
			<div id="language-selector">
				<div id="language-selector-flag-area">
					<div id="en" style="display: inline">				
						<form action="<?php "index.php?site=" . get_site ()  ?>" name="langSelector" method="post">
							<input class="lang-img" name="img" type="image" src="./img/flag_en.png"/>		
							<input type="hidden" name="lang" value="en" />
						</form>
					</div>

					<div id="de" style="display: inline">
						<form action="<?php "index.php?site=" . get_site ()  ?>" name="langSelector" method="post">
							<input class="lang-img" name="img" type="image" src="./img/flag_de.png"/>		
							<input type="hidden" name="lang" value="de" />
						</form>
					</div>

					<div id="fr" style="display: inline">
						<form action="<?php "index.php?site=" . get_site ()  ?>" name="langSelector" method="post">
							<input class="lang-img" name="img" type="image" src="./img/flag_fr.png"/>		
							<input type="hidden" name="lang" value="fr" />
						</form>
					</div>
				</div>

			</div>
		</div>
		<div id="main-area">
			<div id="left-area">
				<?php
				$menu->createHtmlMenu ( "mainMenu", "sidebarlist" );
				?>
			</div>
			<div id="content-area">
					<?php
					$site = get_site ();
					if (file_exists ( "./sites/$site.php" )) {
						include ("./sites/$site.php");
					} else {
						include_once ("./sites/404.php");
					}
					?>
			</div>
			<div id="right-area">
				<div id="user-area">
					<?php
					$menu->createHtmlMenu ( "userMenu", "sidebarlist" );
					?>
				</div>
				<hr />
				<div id="news-area">
					<?php require './includes/login.php';?>
				</div>
			</div>
		</div>
		<div id="footer-area">
			<p>&copy; 2014 The BreakFast Company. All rights reserved.</p>
		</div>
	</div>
</body>
</html>