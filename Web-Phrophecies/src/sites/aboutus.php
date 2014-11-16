<h1>
<?php
switch ($lang) {
	case "en" :
		echo 'About us';
		break;
	case "de" :
		echo '&Uuml;ber uns';
		break;
	case "fr" :
		echo "A propos de BreakFast";
		break;
}
?>
</h1>
<p>
<?php
switch ($lang) {
	case "en" :
		echo 'The <b>BreakFast Company</b> is a start-up, which was founded in early 2014.
			Our goal is to provide you a good quality breakfast in less time and
			with less effort.<br /> 
			Our young and dynamic team is waiting to serve
			you a rich and/or fast breakfast to go - either booked in advance or by
			ordering in our shop.<br />';
		break;
	case "de" :
		echo 'Die <b>BreakFast Company</b> ist ein Start-Up, welches Anfang Jahr 2014 
			gegr&uuml;ndet wurde. Unser Ziel ist es, qualitativ hochwertiges Fr&uuml;hst&uuml;ck in 
			k&uuml;rzerer Zeit mit weniger Aufwand zu liefern.<br />
			Unser junges und dynamisches Team freut sich darauf Ihnen ein reiches 
			und/oder schnelles Fr&uuml;hst&uuml;ck "to go" zu servieren -
			egal ob Sie es im Voraus gebucht haben oder direkt in unserem Laden bestellen.<br />';
		break;
	case "fr" :
		echo 'L\'entreprise <b>BreakFast Company</b> est un "start-up", qu\'était fondue en 2014.
			Notre but sera de vous propose un déjeuner d\'une qualité excellente dans un temps minimal.<br />
			Nos déjeuners sont préparés par notre team à la minute - 
			n\'importe si l\'ordre est placée en ligne ou en magasin.<br />';
		break;
}
?>
</p>
<h2>
<?php
switch ($lang) {
	case "en" :
		echo 'Our team';
		break;
	case "de" :
		echo 'Unser Team';
		break;
	case "fr" :
		echo "Notre team";
		break;
}
?>
</h2>
<table>
	<tr>
		<td><img src="./img/user-a.png" width="100px" /></td>
		<td>Timo B&uuml;rk</td>
	</tr>
	<tr>
		<td><img src="./img/user-b.png" width="100px" /></td>
		<td>Raphael Huber</td>
	</tr>
	<tr>
		<td><img src="./img/user-c.png" width="100px" /></td>
		<td>Sebastian Nellen</td>
	</tr>
</table>
<p></p>