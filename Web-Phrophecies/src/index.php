<?php

$time = time()+60*60*24*30; // expires in 30 days
if(isset ( $_POST ["lang"] )){
	setcookie("lang",$_POST ["lang"],$time);
	$_COOKIE["lang"] = $_POST ["lang"];
}
else if (!isset( $_COOKIE ["lang"])){
	setcookie("lang","en",$time); // expires in 30sec	
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
<?php
include_once "./includes/functions.php";
include_once "./includes/menuController.php";
$menu = new menuController ( "./includes/menus.xml" );
?>
</head>

<body>
	<div id="wrapper">
		<div id="banner-area">
			<img src="./img/BreakFast-Logo-white.png" width="100%" />
			<!-- <h2>The </h2><h1>BreakFast</h1><h2> Company</h2>
		<h3>Start your day with a smile!</h3> -->
		</div>
		<div id="breadcrumps-area">
			<div id="breadcrumps">
				<p>
					<?php
						$menu->createBreadcrumb(get_site(), get_category());
					?>
				</p>
			</div>
			<div id="language-selector">
				
				<form action="<?php "index.php?site=" . get_site ()  ?>" name="langSelector" method="post">              
				    <div id="en">
				        <input type="submit" name="lang" value="en" />
				    </div>
				
				    <div id="de">
				        <input type="submit" name="lang" value="de" />              
				    </div>  
				    
				    <div id="fr">
				        <input type="submit" name="lang" value="fr" />              
				    </div>  
				</form>
				
				<p>
				

				
					<a
						href="<?php
						echo "index.php?site=" . get_site () ;
						?>">DE</a> <a
						href="<?php
						echo "index.php?site=" . get_site () ;
						?>">FR</a> <a
						href="<?php
						echo "index.php?site=" . get_site () ;
						?>">EN</a>

				</p>
			</div>
		</div>
		<div id="main-area">
			<div id="left-area">
				<?php
				$menu->getHtmlMenu ( "mainMenu", "sidebarlist" );
				?>
			</div>
			<div id="content-area">
					<?php
					$site = get_site();
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
					$menu->getHtmlMenu ( "userMenu", "sidebarlist" );
					?>
				</div>
				<hr />
				<div id="news-area">
					<p>The news will be displayed here.</p>
				</div>
			</div>
		</div>
		<div id="footer-area">
			<p>&copy; 2014 The BreakFast Company. All rights reserved.</p>
		</div>
	</div>
</body>
</html>