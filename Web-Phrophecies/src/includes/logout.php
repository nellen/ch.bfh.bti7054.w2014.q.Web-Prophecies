<?php 
session_start();   // create or recover session,
session_unset();   // ... delete all session variables,
session_destroy(); // ... and end it
header ("Location: ../index.php"); // go back to index - but logged out
?>