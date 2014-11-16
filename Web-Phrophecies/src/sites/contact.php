<h1>
<?php
switch ($lang) {
	case "en" :
		echo 'Contact';
		break;
	case "de" :
		echo 'Kontakt';
		break;
	case "fr" :
		echo "Contact";
		break;
}
?>
</h1>
<?php

switch ($lang) {
	case "en" :
		echo '<p>
				The BreakFast Company<br />
				St.-Erpelsburg-Boulevard 0715<br />
				0815 Duckburg
				<br /> <br />
			</p>
			<table id="contact-numbers">
				<tr>
					<td>Phone:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>
			</table>
			<p>
				<br />
			</p>
			<hr />
			<p>
				<br />
				Feel free to leave us a message with the contact form below.
				<br />
			</p>';
		break;
	case "de" :
		echo '<p>
				The BreakFast Company<br />
				St.-Erpelsburg-Boulevard 0715<br />
				0815 Entenhausen
				<br /> <br />
			</p>
			<table id="contact-numbers">
				<tr>
					<td>Telefon:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>
			</table>
			<p>
				<br />
			</p>
			<hr />
			<p>
				<br />
				Kontaktieren Sie uns mittels unten stehendem Formular. Wir freuen uns &uuml;ber Ihre Nachricht.
				<br />
			</p>';
		break;
	case "fr" :
		echo '<p>
				The BreakFast Company<br />
				St.-Erpelsburg-Boulevard 0715<br />
				0815 Duckburg
				<br /> <br />
			</p>
			<table id="contact-numbers">
				<tr>
					<td>Téléphone:&nbsp;&nbsp;</td>
					<td>+1 123 456 78</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>+1 123 456 79</td>
				</tr>
			</table>
			<p>
				<br />
			</p>
			<hr />
			<p>
				<br />
				N\'hésitez pas à nous contacter avec le formulaire ci-dessous.
				<br />
			</p>';
		break;
}
?>


<form name="htmlform" method="post" action="./includes/html_form_send.php">
	<table width="550px">
		<tr>
			<td valign="top"><label for="first_name">First Name *</label></td>
			<td valign="top"><input type="text" name="first_name" maxlength="50"
				size="30" /></td>
		</tr>

		<tr>
			<td valign="top"><label for="last_name">Last Name *</label></td>
			<td valign="top"><input type="text" name="last_name" maxlength="50"
				size="30" /></td>
		</tr>
		<tr>
			<td valign="top"><label for="email">Email Address *</label></td>
			<td valign="top"><input type="text" name="email" maxlength="80"
				size="30" /></td>

		</tr>
		<tr>
			<td valign="top"><label for="telephone">Telephone Number</label></td>
			<td valign="top"><input type="text" name="telephone" maxlength="30"
				size="30" /></td>
		</tr>
		<tr>
			<td valign="top"><label for="comments">Comments *</label></td>
			<td valign="top"><textarea name="comments" cols="50" rows="6"></textarea></td>

		</tr>
		<tr>
			<td colspan="2" style="text-align: center"><input type="submit"
				value="Submit" /> ( <a
				href="http://www.freecontactform.com/html_form.php">based on HTML Form</a>)</td>
		</tr>
		<tr>
			<td>
				<p>&nbsp;</p>
			</td>
		</tr>
	</table>
</form>