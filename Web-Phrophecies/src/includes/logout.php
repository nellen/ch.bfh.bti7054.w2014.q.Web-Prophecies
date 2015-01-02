<?php 
session_start();   // create or recover session,
unset($_SESSION ["user"]); // delete only the user session variable to preserve basket
header ("Location: ../index.php"); // go back to index - but logged out
?>