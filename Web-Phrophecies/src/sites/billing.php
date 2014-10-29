<?php 

$lang = get_language ();

echo "<form action=\"index.php?site=confirm&lang=".$lang."\" method=\"post\">";
echo "<input type=\"hidden\" name=\"artId\" value=\"". $_POST["artId"]. "\" /input>";
echo "<input type=\"hidden\" name=\"varId\" value=\"". $_POST["varId"]. "\" /input>";
echo "Firstname: <input type=\"text\" name=\"firstname\"  /input><br/>";
echo "Lastname: <input type=\"text\" name=\"lastname\"  /input><br/>";
echo "City: <input type=\"text\" name=\"city\"  /input><br/>";
echo "Zip Code: <input type=\"text\" name=\"zip\"  /input><br/>";
echo "Street: <input type=\"text\" name=\"street\"  /input><br/>";
echo "E-mail: <input type=\"text\" name=\"email\"  /input><br/>";
echo "<input class=\"billing-button\" type=\"submit\" value=\"Submit\"/>";
echo "</form>";

?>