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
    <body style="background-color:#f5f5f5;">
    <div class="container-fluid">
    <?php 
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
        <div class="container">
        <h2>Admin Users</h2>
    <p>
    Site to manage Users
    </p>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>