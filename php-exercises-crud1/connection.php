<?php
$host = "localhost";
$dbname = "colyseum";
$user = "root";
$password = "mkahms139142215";
try
{
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;carset=utf8", $user, $password);
}
catch(Exception $e)
{
    die("Error : " . $e->getMessage());
}
?>