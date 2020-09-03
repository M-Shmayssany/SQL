<?php
include './connection.php';
$showTypeID = $bdd->query("SELECT * FROM `showTypes`");
$showGenres = $bdd->query("SELECT * FROM `genres`");
$spectacle;
$artiste;
$date;
$typeId;
$genres1;
$genres2;
$duration;
$startTime;
$count = 0;
$table = array();
while($data = $showGenres->fetch()){
    array_push($table, $data);
}
if (isset($_POST['add'])){
    if(isset($_POST['spectacle'])){
        $spectacle = $_POST['spectacle'];
    }else{
        echo "Veuillez entrer le nom de spectacle.";
        $count++;
    }
    if(isset($_POST['artiste'])){
        $artiste = $_POST['artiste'];
    }else{
        echo "Veuillez entrer le nom de artiste.";
        $count++;
    }
    if(isset($_POST['date'])){
        $date = $_POST['date'];
    }else{
        echo "Veuillez entrer le date de spectacle.";
        $count++;
    }
    if(isset($_POST['typeId'])){
        $typeId = $_POST['typeId'];
    }else{
        echo "Veuillez entrer le date de spectacle.";
        $count++;
    }
    if(isset($_POST['genres1'])){
        $genres1 = $_POST['genres1'];
    }else{
        
        $count++;
    }
    if(isset($_POST['genres2'])){
        $genres2 = $_POST['genres2'];
    }else{
        
        $count++;
    }
    if(isset($_POST['duration'])){
        $duration = $_POST['duration'];
        
    }else{
        echo "Veuillez entrer le duration de la spectacle.";
        $count++;
    }
    if(isset($_POST['startTime'])){
        $startTime = $_POST['startTime'];
    }else{
        echo "Veuillez entrer le Heure de début de la spectacle.";
        $count++;
    }
    if($count == 0){
        if($bdd->query('INSERT INTO `shows` 
        (`title`, `performer`, `date`, `showTypesId`, `firstGenresId`, `secondGenreId`, `duration`, `startTime`)
        VALUES ("' . $spectacle .  '", "' . $artiste .  '", "' . $date .  '", "' . $typeId .  '", "' . $genres1 .  '", "' . $genres2 .  '", "' . $duration .  '", "' . $startTime .  '")')){
            echo "L'enregistrement a été affecté avec succès.";
        }else{
            echo "Error : " . print_r($bdd->error);
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
    <form method="post" action="">
    <label for="spectacle">Spectacle :</label>
    <input type="text" name="spectacle" placeholder="Entrez le titre de spectacle"><br />
    <label for="artiste">Artiste :</label>
    <input type="text" name="artiste" placeholder="Entrez nom de l'artiste."><br />
    <label for="date">Date :</label>
    <input type="date" name="date" placeholder="Entrez le date."><br />
    <label for="typeId">Type :</label>
    <select name="typeId" id="typeId">
    <?php
    while ($data = $showTypeID->fetch()){
        echo "<option value='" . $data['id'] . "'>" . $data['type'] . "</option>";
    }
    ?>
    </select><br />
    <label for="genres1">Premiers genres :</label>
    <select name="genres1" id="genres1">
    <?php
    foreach($table as $data){
        echo "<option value='" . $data['id'] . "'>" . $data['genre'] . "</option>";
    }
    ?>
    </select><br />
    <label for="genres2">Seconds genres :</label>
    <select name="genres2" id="genres2">
    <?php
    foreach($table as $data){
        echo "<option value='" . $data['id'] . "'>" . $data['genre'] . "</option>";
    }
    ?>
    </select><br />
    <label for="duration">Duration :</label>
    <input type="time" name="duration"><br />
    <label for="startTime">Start time :</label>
    <input type="time" name="startTime"><br />
    <button type="submit" name="add" value="submit">Ajouter</button>
    </form>
</body>
</html>