<?php 

echo "<div class=\"article\">";
echo "<h1>Croissant</h1>";
echo "<img src=\"./img/user-a.png\" width=\"100px\" height=\"100px\"/>";
echo "<p class=\"article-price\">Price: 1.50 CHF</p>";
echo "<select name=\"variations\" size=\"1\">";
echo "<option>normal</option>";
echo "<option>with butter + 0.00 CHF</option>";
echo "<option>whole grain + 0.00 CHF</option>";
echo "</select>";
echo "<p>Homemade croissants. Freshly baked each morning.</p>";
echo "<br/>";
echo "<button onclick=\"msgAddtoBasket()\">Add to basket</button>";

echo "</div>";

?>