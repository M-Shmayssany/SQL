<?php
include "./connection.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="./css/basics.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
<?php
// PDO - Partie 1 : Lire des données
// Exercice 1:
function table_clients($sql){
    global $bdd;
    $result = $bdd->query($sql);
?>
    
    <table>
        <tr> 
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Birth date</th>
            <th>Card</th>
            <th>Card number</th>
        </tr>
        <?php
while ($data = $result->fetch()){
  echo "<tr>";
  echo "<td>" . $data['id'] . "</td>";
  echo "<td>" . $data['lastName'] . "</td>";
  echo "<td>" . $data['firstName'] . "</td>";
  echo "<td>" . $data['birthDate'] . "</td>";
  echo "<td>" . $data['card'] . "</td>";
  echo "<td>" . $data['cardNumber'] . "</td>";
  echo "</tr>";
}
?>
    </table>
<?php
$result->closeCursor();
}
echo "<h1>Exercice 1: Liste des clients</h1>";
table_clients("SELECT * FROM clients");

// PDO - Partie 1 : Lire des données
//Exercice 2: Afficher tous les types de spectacles possibles.
echo "<h1>Exercice 2: Afficher tous les types de spectacles possibles.</h1>";
$result = $bdd->query("SELECT * FROM `showTypes` ");
?>
    <table>
        <tr> 
            <th>ID</th>
            <th>Type</th>
         </tr>
<?php
while ($data = $result->fetch()){
    echo "<tr>";
    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . $data['type'] . "</td>";
    echo "</tr>";
}
?>
</table>
<?php
$result->closeCursor();

// PDO - Partie 1 : Lire des données
// Exercice 3: Afficher les 20 premiers clients.
echo "<h1>Exercice 3: Afficher les 20 premiers clients.</h1>";
table_clients("SELECT * FROM `clients` LIMIT 20");


// PDO - Partie 1 : Lire des données
//Exercice 4 : N'afficher que les clients possédant une carte de fidélité.
echo "<h1>Exercice 4 : N'afficher que les clients possédant une carte de fidélité</h1>";
table_clients("SELECT * FROM clients WHERE card=1");

// PDO - Partie 1 : Lire des données
//Exercice 5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
echo "<h1>Exercice 5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre 'M'.</h1>";
$result = $bdd->query("SELECT `lastName`,`firstName` FROM `clients` WHERE `lastName`like'M%' ORDER BY `lastName` ASC ");
while ($data = $result->fetch()){
    echo "<p>Nom :" . $data[0] . "</p>";
    echo "<p>Prénom :" . $data[1] . "</p>";
}
$result->closeCursor();

// PDO - Partie 1 : Lire des données
//Exercice 6 : Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique.
echo "<h1>Exercice 6 : Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique.</h1>";
$result = $bdd->query("SELECT * FROM `shows`");
while ($data = $result->fetch()){
    echo "<p>ceci :" . $data['title'] . " par " . $data['performer']  . " le " . $data['date'] . " à " . $data['startTime'] . "</p>";
    echo "<br>";
}

// PDO - Partie 1 : Lire des données
//Exercice 7 : Afficher tous les clients comme ceci.
echo "<h1>Exercice 7 : Afficher tous les clients comme ceci..</h1>";
$result = $bdd->query("SELECT * FROM `clients`");
while ($data = $result->fetch()){
    echo "<p>Nom : " . $data['lastName'] . "</p>";
    echo "<p>Prénom : " . $data['firstName'] . "</p>";
    echo "<p>Date de naissance : " . $data['birthDate'] . "</p>";
    echo "<p>Carte de fidélité : " . (($data['card']==1) ? "Yes" : "No") . "</p>";
    echo "<p>Numéro de carte : " . (($data['card']==1) ? $data['cardNumber'] : "No") . "</p>";
    echo "<br>";
}

?>
  </body>
</html>