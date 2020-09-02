<?php
include './connection.php';
$name;
$prenome;
$dateN;
$card;
$cardNumber;
$errorCount = 0;
if(isset($_GET['add'])){
    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }else{
        echo  "Remplir le champ de nom";
        $errorCount++;
    }
    if(isset($_GET['prénom'])){
        $prenome = $_GET['prénom'];
    }else{
        echo  "Remplir le champ de prénom";
        $errorCount++;
    }
    if(isset($_GET['date'])){
        $dateN = $_GET['date'];
    }else{
        echo  "Remplir le champ de date";
        $errorCount++;
    }
    if(isset($_GET['rd'])){
        $card = $_GET['rd'];
    }else{
        $card = 0;
    }
    if(isset($_GET['cardNumber'])){
        $cardNumber = $_GET['cardNumber'];
        $cardNumber = !empty($cardNumber) ? $cardNumber : "NULL";
    }
}
if($errorCount == 0 && isset($_GET['add'])){
    if($bdd->query('INSERT INTO `clients` (`firstName`, `lastName`, `birthDate`, `card`, `cardNumber`) VALUES ("' . $name . '", "' . $prenome . '", "' . $dateN . '", ' . $card . ', ' . $cardNumber . ')')){
        echo "Record inserted successfully";
    }else{
        echo "Error: " . $bdd->errorInfo();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-exercises-crud2</title>
</head>
<body>
    <form method="get" action="">
    <label for="name">Name :</label>
    <input type="text" name="name" placeholder="Entrez le nom"><br />
    <label for="prénom">Prénom :</label>
    <input type="text" name="prénom" placeholder="Entrez votre prénom."><br />
    <label for="date">Date de naissance :</label>
    <input type="date" name="date" placeholder="Entrez votre date de naissance."><br />
    <label for="rd">Carte de fidélité :</label>
    <input type="checkbox" name="rd" value="1"><br />
    <label for="cardNumber">Numéro de carte de fidélité :</label>
    <input type="text" name="cardNumber" placeholder ="Entrez le numéro de carte"><br />
    <button type="submit" name="add" value="submit">Add</button>
    </form>
</body>
</html>