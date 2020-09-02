<?php
//Check if credentials are valid
session_start();
if (isset($_SESSION['username']) && $_SESSION['password']){
    echo "<h2>" . $_SESSION['username'] . ".</h2>";
}else{
    header("Location: login.php");
}

?>
<a href="read.php">Read list</a>
<a href="logout.php">Logout</a>