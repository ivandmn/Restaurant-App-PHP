<!DOCTYPE html>
<html lang="es">
<head>
  <title>Figic Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#f5f5f5;">
<?php
session_start();
//Variables per guardar els errors per despres imprimirlos a l'HTML
$enterUsername = "";
$enterPassword = "";
$enterName = "";
$enterSurname = "";
$validUsername = "";
$validPassword = "";
$validName = "";
$validSurname = "";
$errors = false;

//Variables per guardar les dades que introdueix l'usuari perque aixi despres si falla alguna cosa a la validacio que no els tingui que tornar a posar
$username = "";
$password = "";
$name = "";
$surname = "";

include_once "fn-php/php.php";

//Elimina espais abans y despres del string
  function filtrar($datos){
      $datos = trim($datos); 
      return $datos;
  }

//Si s'ha apretar el boto de register s'entra a l'IF
if (isset($_POST['registersubmit'])) {
  //Es crea una arry per guardar l'informació de l'usuari
  $infoUser = array(
    'username' => filtrar($_POST['username']),
    'password' => filtrar($_POST['password']),
    'role' => 'registered',
    'name' => filtrar($_POST['name']),
    'surname' => filtrar($_POST['surname'])
  );
//Username Filter and Validate
  if ($infoUser["username"] != "") {
    $username = $infoUser["username"]; 
      $infoUser["username"] = filter_var($infoUser["username"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
      if (!filter_var($infoUser["username"],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z0-9]+$/")))){
        $validUsername = "Please enter a valid username";
        $errors = true;
      }
  }
  else{
    $enterUsername = "Please enter a your username";
    $errors = true;
  }
//Password Filter and Validate
  if ($infoUser["password"] != "") {
    $password = $infoUser["password"]; 
      $infoUser["password"] = filter_var($infoUser["password"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    if (!filter_var($infoUser["password"],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z0-9]+$/")))){
      $validPassword = "Please enter a valid password";
      $errors = true;
    }
}
else{
  $enterPassword = "Please enter a your password";
  $errors = true;
}
//Name Filter and Validate
  if ($infoUser["name"] != "") {
    $name = $infoUser["name"]; 
      $infoUser["name"] = filter_var($infoUser["name"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    if (!filter_var($infoUser["name"],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z_ ]+$/")))){
      $validName = "Please enter a valid name";
      $errors = true;
    }
}
else{
  $enterName = "Please enter your name";
  $errors = true;
}

//Surname Filter and Validate
if ($infoUser["surname"] != "") {
  $surname = $infoUser["surname"];
  $infoUser["surname"] = filter_var($infoUser["surname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
if (!filter_var($infoUser["surname"],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z_ ]+$/")))){
  $validSurname = "Please enter a valid surname";
  $errors = true;
}
}
else{
$validSurname = "Please enter your surname";
$errors = true;
}

//Insert User if not errors appear
if(!$errors){
  insertUser($username,$password,"registered",$name,$surname);
  echo "<h3>Your user has been created!</h3>";
  }

}
?>
<div class="container-fluid">
  <?php include_once "topmenu.php";?>
  <h2>Registration form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value = <?php echo $username?>>
      <a><?php echo $enterUsername?></a>
      <a><?php echo $validUsername?></a>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value = <?php echo $password?>>
      <a><?php echo $enterPassword?></a>
      <a><?php echo $validPassword?></a>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value = <?php echo $name?>>
      <a><?php echo $enterName?></a>
      <a><?php echo $validName?></a>
    </div>
    <div class="form-group">
      <label for="surname">Surname:</label>
      <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value = <?php echo $surname?>>
      <a><?php echo $enterSurname?></a>
      <a><?php echo $validSurname?></a>
    </div>
    <button type="submit" name="registersubmit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>