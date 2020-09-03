<?php
include './connection.php';

$name = "";
$prenome = "";
$dateN = "";
$card = 0;
$cardNumber = "";
$errorCount = 0;
if(isset($_GET['Submit']) && $_GET['Submit'] == 'search'){
    $searchColumn = $_GET['selectField'];
    $searchField = $_GET['searchField'];
    if($result = $bdd->query("SELECT * FROM `clients` WHERE `$searchColumn` = '$searchField' LIMIT 1")){
        $data = $result->fetch();
        
        $name = $data['lastName'];
        $prenome = $data['firstName'];
        $dateN = $data['birthDate'];
        $card = $data['card'];
        $cardNumber = $data['cardNumber'];
    }else{
        echo "Error : " . $result->error;
    }
}
if (isset($_GET['modifier']) && $_GET['modifier'] == 'submit'){
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
    if($errorCount == 0){
        if($bdd->query("UPDATE `clients` SET `lastName`='$name',`firstName`='$prenome',`birthDate`='$dateN',`card`='$card',`cardNumber`='$cardNumber' WHERE `firstName` ='$prenome' AND `lastName` ='$name'")){
            echo "Record inserted successfully";
        }else{
            echo "Error: " . $bdd->error;
        }
        
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
        <label for="searchField">Chercher par : </label>
        <select name="selectField">
            <option value="lastName">Nom</option>
            <option value="firstName">Prénom</option>
        </select>
        <input type="text" name="searchField" id="searchField">
        <button type="submit" name="Submit" value="search">Chercher</button>
    </form>
    <hr>
    <form method="get" action="">
        <label for="name">Nom :</label>
        <input type="text" name="name" value="<?php echo $name ?>"><br />
        <label for="prénom">Prénom :</label>
        <input type="text" name="prénom" value="<?php echo $prenome ?>"><br />
        <label for="date">Date de naissance :</label>
        <input type="date" name="date" value="<?php echo $dateN ?>"><br />
        <label for="rd">Carte de fidélité :</label>
        <input type="checkbox" name="rd" value="1"<?php echo ($card == 1) ? "checked":""; ?> ><br />
        <label for="cardNumber">Numéro de carte de fidélité :</label>
        <input type="text" name="cardNumber" value="<?php echo $cardNumber ?>"><br />
        <button type="submit" name="modifier" value="submit">Modifier</button>
    </form>
</body>
</html>