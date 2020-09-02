<?php
//Logout 
// open the session.
session_start();
// destroy the session variables.
session_unset();
// destroy the session.
session_destroy();
// redirect ot login page.
header("Location: login.php");

?>
