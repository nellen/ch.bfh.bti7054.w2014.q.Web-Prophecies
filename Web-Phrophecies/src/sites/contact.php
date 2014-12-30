<?php 

function fill_template(&$template, $tag, $content) {
	$template = str_replace("@$tag@", $content, $template);
}

// fill $title, $address, $contactNumbers, $contactUs
switch ($lang) {
	case "en" :
		$title = 'Contact';
		$address = 
				'The BreakFast Company<br />
				Aarefeldstrasse 16<br />
				3600 Thun
				<br /> <br />';
		$contactNumbers = 
				'<tr>
					<td>Phone:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>';
		$contactUs = 'Feel free to leave us a message with the contact form below.';
		break;
	case "de" :
		$title = 'Kontakt';
		$address =
				'The BreakFast Company<br />
				Aarefeldstrasse 16<br />
				3600 Thun
				<br /> <br />';
		$contactNumbers =
				'<tr>
					<td>Telefon:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>';
		$contactUs = 'Kontaktieren Sie uns mittels unten stehendem Formular. Wir freuen uns &uuml;ber Ihre Nachricht.';
		break;
	case "fr" :
		$title = "Contact";
		$address =
				'The BreakFast Company<br />
				Aarefeldstrasse 16<br />
				3600 Thoune
				<br /> <br />';
		$contactNumbers =
				'<tr>
					<td>Téléphone:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>';
		$contactUs = 'N\'hésitez pas à nous contacter avec le formulaire ci-dessous.';
		break;
}

$template = file_get_contents(ROOT."/sites/contact.html");
fill_template($template, "title", $title);
fill_template($template, "address", $address);
fill_template($template, "contactNumbers", $contactNumbers);
fill_template($template, "contactUs", $contactUs);

echo $template;

?>