<?php
include './connection.php';;
$message = "";

if (isset($_POST['username'])){
  $name = $_POST['username'];
  $result = $bdd->query("SELECT * FROM `user` WHERE `username` = '" . $name . "'");
  $data = $result->fetch();
  if($data){
    if (isset($_POST['password'])){
      $pwd = sha1($_POST['password']);
      if($data['password'] == $pwd){
        session_start();
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $password;
        header("Location: check_login.php");
      }else{
        $message = "Incorrect password";
      }
    }else{
      $message = "please enter your password";
    }
  }else{
    $message = "the username does not exist.";
  }
}else{
    $message = "please enter your user name.";
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <h1>Login</h1>
<?php echo "<h4>$message</h4>"; ?>
    <form action="" method="post">
      <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
      </div>
      <div>
        <button type="submit" name="button">Se connecter</button>
      </div>
    </form>
  </body>
</html>
