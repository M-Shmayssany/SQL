<?php
include './connection.php';
$name;
$prenome;
$dateN;
$card;
$cardNumber;
$cardType;
$errorCount = 0;
$cardTypesResult = $bdd->query("SELECT * FROM `cardTypes`");

if(isset($_POST['add'])){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }else{
        echo  "Remplir le champ de nom";
        $errorCount++;
    }
    if(isset($_POST['prénom'])){
        $prenome = $_POST['prénom'];
    }else{
        echo  "Remplir le champ de prénom";
        $errorCount++;
    }
    if(isset($_POST['date'])){
        $dateN = $_POST['date'];
    }else{
        echo  "Remplir le champ de date";
        $errorCount++;
    }
    if(isset($_POST['rd'])){
        $card = $_POST['rd'];
        if($card == 1){
            if($bdd->query('INSERT INTO `cards` (`cardNumber`, `cardTypesId`) VALUES ("' . $cardNumber . '", "' . $cardType . '")')){
                echo "Record card inserted successfully";
            }else{
                echo "Error: " . $bdd->error;
            }
        }
    }else{
        $card = 0;
    }
    if(isset($_POST['cardNumber'])){
        $cardNumber = $_POST['cardNumber'];
        $cardNumber = !empty($cardNumber) ? $cardNumber : "NULL";
    }
    if(isset($_POST['type'])){
        $cardType = $_POST['type'];
    }
}
if($errorCount == 0 && isset($_POST['add'])){
    if($bdd->query('INSERT INTO `clients` (`firstName`, `lastName`, `birthDate`, `card`, `cardNumber`) VALUES ("' . $name . '", "' . $prenome . '", "' . $dateN . '", ' . $card . ', ' . $cardNumber . ')')){
        echo "Record client inserted successfully.\n";
    }else{
        echo "Error: " . $bdd->error;
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
    <form method="post" action="">
    <label for="name">Name :</label>
    <input type="text" name="name" placeholder="Entrez le nom"><br />
    <label for="prénom">Prénom :</label>
    <input type="text" name="prénom" placeholder="Entrez votre prénom."><br />
    <label for="date">Date de naissance :</label>
    <input type="date" name="date" placeholder="Entrez votre date de naissance."><br />
    <label for="rd">Carte de fidélité :</label>
    <input type="checkbox" name="rd" value="1"><br />
    <label for="type">Ttype de carte de fidélité :</label>
    <select name="type" id="type">
    <?php
    while ($data = $cardTypesResult->fetch()){
        echo "<option value='" . $data['id'] . "'>" . $data['type'] . "</option>";
    }
    ?>
    </select><br />
    <label for="cardNumber">Numéro de carte de fidélité :</label>
    <input type="text" name="cardNumber" placeholder ="Entrez le numéro de carte"><br />
    <button type="submit" name="add" value="submit">Ajouter</button>
    </form>
</body>
</html>