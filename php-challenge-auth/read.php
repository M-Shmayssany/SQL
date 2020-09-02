<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['password']){
    echo "<h2>" . $_SESSION['username'] . ".</h2>";
}else{
    header("Location: login.php");
}
include 'connection.php';

$result = $bdd->query("SELECT * FROM `hiking` ");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="./css/basics.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <a href="./create.php">ADD NEW</a>
    <a href="logout.php">Logout</a>
    <table>
      <tr> 
          <th></th>
          <th>ID</th>
          <th>Name</th>
          <th>Difficulty</th>
          <th>Distance</th>
          <th>Duration</th>
          <th>Height difference</th>
      </tr>
<?php
while ($data = $result->fetch()){
  echo "<tr>";
  echo "<td><button onclick='location.href = `./update.php?id=". $data['id'] ."`;' id='update' class='float-left submit-button' >Update</button><button onclick='location.href = `./delete.php?id=". $data['id'] ."`;' id='update' class='float-left submit-button' >Delete</button></td>";
  echo "<td>" . $data['id'] . "</td>";
  echo "<td>" . $data['name'] . "</td>";
  echo "<td>" . $data['difficulty'] . "</td>";
  echo "<td>" . $data['distance'] . "</td>";
  echo "<td>" . $data['duration'] . "</td>";
  echo "<td>" . $data['height_difference'] . "</td>";
  echo "</tr>";
}
?>
    </table>
  </body>
</html>
<?php
$result->closeCursor();
?>