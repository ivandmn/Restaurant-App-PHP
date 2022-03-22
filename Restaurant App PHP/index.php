<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Figic</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body background="images/restaurant.jpg" style="background-size:cover;">
    <div class="container-fluid">
        <?php 
        //PHP per mostrar el top de la pagina depenen del rol que tingui l'usuari que ha fet logging
        session_start();
        if(isset($_SESSION["rol"])){
            if($_SESSION["rol"] == "registered"){
                include_once "topMenuRegistered.php";
            }
            elseif($_SESSION["rol"] == "staff"){
                include_once "topMenuStaff.php";
            }
            elseif($_SESSION["rol"] == "admin"){
                include_once "topMenuAdmin.php";
            }
        }
        else{
            include_once "topmenu.php";
        }
        ?>
        <div class="container" id="maincontainer">
        <h2 style="color:white;">Restaurant Figic</h2>
    <p style="color:white;"> 
    Benbinguts al restaurant Figic, aquest restaurant té el reconeixement de 3 estrelles michelin y podras trobár varietats de plats de tots els racons del món, esperem que sigui agradable la teva visita!
    </p>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>