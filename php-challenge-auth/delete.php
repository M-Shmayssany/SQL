<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['password']){
    echo "<h2>" . $_SESSION['username'] . ".</h2>";
}else{
    header("Location: login.php");
}
/**** Supprimer une randonnée ****/
include  './connection.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
    if ($bdd->query("DELETE FROM `hiking` WHERE `id`='" . $id . "';")){
        echo "Record deleted successfully";
        echo '<a href="./read.php">Liste des données</a>';
    }else{
        echo "Error deleted record: " . $bdd->error;
        echo '<a href="./read.php">Liste des données</a>';
    }
}
?>
<a href="logout.php">Logout</a>
