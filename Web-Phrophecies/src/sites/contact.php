<?php 

function fill_template(&$template, $tag, $content) {
	$template = str_replace("@$tag@", $content, $template);
}

// fill $title, $address, $phoneNumbers, $contactUs
switch ($lang) {
	case "en" :	
		$address = 
				'The BreakFast Company<br />
				Aarefeldstrasse 16<br />
				3600 Thun
				<br /> <br />';
		$phoneNumbers = 
				'<tr>
					<td>Phone:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>';
		break;
	case "de" :
		$address =
				'The BreakFast Company<br />
				Aarefeldstrasse 16<br />
				3600 Thun
				<br /> <br />';
		$phoneNumbers =
				'<tr>
					<td>Telefon:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>';
		break;
	case "fr" :
		$address =
				'The BreakFast Company<br />
				Aarefeldstrasse 16<br />
				3600 Thoune
				<br /> <br />';
		$phoneNumbers =
				'<tr>
					<td>Téléphone:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>';
		break;
}

$template = file_get_contents(ROOT."/sites/contact.html");
fill_template($template, "title", $contactTitle);
fill_template($template, "address", $address);
fill_template($template, "contactNumbers", $phoneNumbers);
fill_template($template, "contactUs", $contactFormHeading);
fill_template($template, "firstname", $AddressFirstnameLabel);
fill_template($template, "lastname", $AddressLastnameLabel);
fill_template($template, "email", $AddressEmailLabel);
fill_template($template, "phonenumber", $contactPhoneNumber);
fill_template($template, "comments", $contactComments);
fill_template($template, "send", $contactFormSend);

echo $template;

?>