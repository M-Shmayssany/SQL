<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['password']){
    echo "<h2>" . $_SESSION['username'] . ".</h2>";
}else{
    header("Location: login.php");
}
include './connection.php';
if (isset($_GET['id'])){
	$query = $bdd->query("SELECT * FROM `hiking` WHERE `id`=" . $_GET['id']);
	$rowData = $query->fetch();
}
if (isset($_POST['button'])){
$id = $_POST['id'];
$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$heightDifference = $_POST['height_difference'];

	if ($bdd->query("UPDATE `hiking` SET `name`='" . $name . "',`difficulty`='" . $difficulty . "',`distance`='" . $distance . "',`duration`='" . $duration . "',`height_difference`='" . $heightDifference . "' WHERE `id`='" . $id . "';")) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $bdd->error;
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="./read.php">Liste des données</a>
	<a href="logout.php">Logout</a>
	<h1>Modifier</h1>
	<form action="" method="post">
		<div>
		<input type="hidden" name="id" value="<?php echo $rowData['id']; ?>">
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $rowData['name']; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php echo ($rowData['difficulty'] == "très facile")? ' selected="selected"':""; ?>>Très facile</option>
				<option value="facile" <?php echo ($rowData['difficulty'] == "facile")? ' selected="selected"':""; ?>>Facile</option>
				<option value="moyen" <?php echo ($rowData['difficulty'] == "moyen")? ' selected="selected"':""; ?>>Moyen</option>
				<option value="difficile" <?php echo ($rowData['difficulty'] == "difficile")? ' selected="selected"':""; ?>>Difficile</option>
				<option value="très difficile" <?php echo ($rowData['difficulty'] == "très difficile")? ' selected="selected"' : ""; ?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $rowData['distance']; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $rowData['duration']; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $rowData['height_difference']; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
