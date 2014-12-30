<?php 

require_once './includes/skypestatus.inc.php';

$status_burkt4 = getSkypeStatus("burkt4", $lang, "smallicon");
$status_huber3 = getSkypeStatus("surferboy8722", $lang, "smallicon");
$status_nells1 = getSkypeStatus("sebastian.nellen", $lang, "smallicon");

// fill $title, $description, $subTitle
switch ($lang) {
	case "en" :
		$title = 'About us';
		$description = 
			'The <b>BreakFast Company</b> is a start-up, which was founded in early 2014.
			Our goal is to provide you a good quality breakfast in less time and
			with less effort.<br />
			Our young and dynamic team is waiting to serve
			you a rich and/or fast breakfast to go - either booked in advance or by
			ordering in our shop.<br />';
		$subTitle = 'Our team';
		break;
	case "de" :
		$title = '&Uuml;ber uns';
		$description =
			'Die <b>BreakFast Company</b> ist ein Start-Up, welches Anfang Jahr 2014
			gegr&uuml;ndet wurde. Unser Ziel ist es, qualitativ hochwertiges Fr&uuml;hst&uuml;ck in
			k&uuml;rzerer Zeit mit weniger Aufwand zu liefern.<br />
			Unser junges und dynamisches Team freut sich darauf Ihnen ein reiches
			und/oder schnelles Fr&uuml;hst&uuml;ck "to go" zu servieren -
			egal ob Sie es im Voraus gebucht haben oder direkt in unserem Laden bestellen.<br />';
		$subTitle = 'Unser Team';
		break;
	case "fr" :
		$title = "A propos de BreakFast";
		$description = 
			'L\'entreprise <b>BreakFast Company</b> est un "start-up", qu\'était fondue en 2014.
			Notre but sera de vous propose un déjeuner d\'une qualité excellente dans un temps minimal.<br />
			Nos déjeuners sont préparés par notre team à la minute -
			n\'importe si l\'ordre est placée en ligne ou en magasin.<br />';
		$subTitle = "Notre team";
		break;
}

function fill_template(&$template, $tag, $content) {
	$template = str_replace("@$tag@", $content, $template);
}

$template = file_get_contents(ROOT."/sites/about_us.html");
fill_template($template, "title", $title);
fill_template($template, "description", $description);
fill_template($template, "subTitle", $subTitle);

echo $template;

?>

<table>
	<tr>
		<td><img src="./img/user-a.png" width="100px" /></td>
		<td>Timo B&uuml;rk<br />
		<?php 
		echo '<img src="'.$status_burkt4["img_url"].'" alt="'.$status_burkt4["text"].'" title="'.$status_burkt4["text"].'">';
		echo "  ".getSkypeStatusText($status_burkt4);
		?>
		</td>
	</tr>
	<tr>
		<td><img src="./img/user-b.png" width="100px" /></td>
		<td>Raphael Huber<br />
		<?php 
		echo '<img src="'.$status_huber3["img_url"].'" alt="'.$status_huber3["text"].'" title="'.$status_huber3["text"].'">';
		echo "  ".getSkypeStatusText($status_huber3);
		?>
		</td>
	</tr>
	<tr>
		<td><img src="./img/user-c.png" width="100px" /></td>
		<td>Sebastian Nellen<br />
		<?php 
		echo '<img src="'.$status_nells1["img_url"].'" alt="'.$status_nells1["text"].'" title="'.$status_nells1["text"].'">';
		echo "  ".getSkypeStatusText($status_nells1); 
		?>
		</td>
	</tr>
</table>