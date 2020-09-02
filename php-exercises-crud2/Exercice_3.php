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
$genres3;
$duration;
$startTime;
$table = array();
while($data = $showGenres->fetch()){
    array_push($table, $data);
}

if(isset($spectacle)){
    $spectacle = $_GET['spectacle'];
}else{
    echo "Veuillez entrer le nom de spectacle."
}
if(isset($artiste)){
    $artiste = $_GET['artiste'];
}else{
    echo "Veuillez entrer le nom de artiste."
}
if(isset($date)){
    $date = $_GET['date'];
}else{
    echo "Veuillez entrer le date de spectacle."
}
if(isset($duration)){
    $duration = $_GET['duration'];
}else{
    echo "Veuillez entrer le duration de la spectacle."
}
if(isset($startTime)){
    $startTime = $_GET['startTime'];
}else{
    echo "Veuillez entrer le Heure de début de la spectacle."
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
    <label for="genres3">Troisièmes genres :</label>
    <select name="genres3" id="genres3">
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
    <button type="submit" name="add" value="submit">Add</button>
    </form>
</body>
</html>