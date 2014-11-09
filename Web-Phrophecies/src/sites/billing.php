<?php 

$lang = get_language ();

echo "<form action=\"index.php?site=confirm&lang=".$lang."\" method=\"post\">";
echo "<input type=\"hidden\" name=\"artId\" value=\"". $_POST["artId"]. "\" /input>";
echo "<input type=\"hidden\" name=\"varId\" value=\"". $_POST["varId"]. "\" /input>";
echo "<table class=\"address-form-table\">";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">Firstname:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"firstname\"  /input>";
echo		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo		"<td class=\"address-form-table-label\">Lastname:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"lastname\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">City \ Zip Code:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field-city\" type=\"text\" name=\"city\"  /input>";
echo 			"<input class=\"address-form-field-zip\" type=\"text\" name=\"zip\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">Street:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"street\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo 	"<tr>";
echo 		"<td class=\"address-form-table-label\">E-mail:</td>";
echo 		"<td>";
echo 			"<input class=\"address-form-field\" type=\"text\" name=\"email\"  /input>";
echo 		"</td>";
echo 	"</tr>";
echo "</table>";
echo "<input class=\"billing-button\" type=\"submit\" value=\"Submit\"/>";
echo "</form>";

?>