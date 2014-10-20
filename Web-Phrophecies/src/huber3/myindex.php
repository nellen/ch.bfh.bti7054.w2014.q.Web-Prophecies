<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>The BreakFast Company</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="stylesheet" href="../css/format.css" type="text/css" />
<?php include_once 'menus.php'; ?>
</head>

<body>
	<div id="wrapper">
		<div id="banner-area">
			<img src="../img/BreakFast-Logo-white.png" width="100%" />
			<!-- <h2>The </h2><h1>BreakFast</h1><h2> Company</h2>
		<h3>Start your day with a smile!</h3> -->
		</div>
		<div id="breadcrumps">
			<p>
				<a href="./index.php">Home</a>
			</p>
		</div>
		<div id="main-area">
			<div id="left-area">
				<?php
				echo buildMenu( $navMenu, "sidebarlist" );
				?>
			</div>
			<div id="content-area">
				<h1>Webshop</h1>
				<p>The content will be displayed in the content area.</p>
			</div>
			<div id="right-area">
				<div id="user-area">
					<?php
					echo buildMenu( $userMenu, "sidebarlist" );
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