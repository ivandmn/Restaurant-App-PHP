<!DOCTYPE html>
<html lang="es">
<head>
  <title>Figic Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#f5f5f5;">
<?php
//Variables per guardar els errors i despres imprimirlos a l'HTML
$errorEnterUserName = "";
$errorEnterPassword = "";
$errorUserNotExist = "";
$errors = false;
include_once "fn-php/php.php";

//Quan li donem al boto de submit entra a l'IF
if (isset($_POST['loginsubmit'])) {
  //Si el username no esta buit no saltaran errors
  if($_POST["username"] != ""){
  }else{
    $errors = true;
    $errorEnterUserName =  "<p>Please enter your username</p>";
  }
  if($_POST["password"] != ""){

  }else{
    $errors = true;
    $errorEnterPassword = "<p>Please enter your password</p>";
  }
//Si no hi ha errors es busca l'usuari amb la funcio findUsernamebyUsernameAndPassword que tornara una array amb l'usuari si el troba o buida si no el troba
  if(!$errors){
    session_start();
    $userexist = findUsernamebyUsernameAndPassword($_POST["username"], $_POST["password"]);
    if(empty($userexist)){
      $errorUserNotExist =  "User dont exist!";
    }
    //Si la array no esta buida es crean dos noves sesions amb el username y rol de l'usuari y es redirecciona a l'index.php
    else{
      $_SESSION["rol"] = $userexist[2];
      $_SESSION["usuario"] = $userexist[0];
      header("location: index.php");
    }
  }
}
?>
<div class="container-fluid">
  <h2>Login form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
      <a><?php echo $errorEnterUserName?></a>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      <a><?php echo $errorEnterPassword?></a>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label><br>
      <a><?php echo $errorUserNotExist?></a>
    </div>
    <button type="submit" name="loginsubmit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>