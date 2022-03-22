<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <?php
      $username = $_SESSION["usuario"];
      $rol = $_SESSION["rol"];
      ?>   
      <nav class="navbar navbar-default">
      <div class="container col-md-10">
      <div class="navbar-header">
      <a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
      </div>
      <ul class="nav navbar-nav">
      <li><a href='index.php'>Home</a></li>
      <li><a href='daymenu.php'>Day Menu</a></li>
      <li><a href='MenusView.php'>View Menus</a></li>
      <li><a href='MenusAdmin.php'>Admin Menus</a></li>
      <li><a href='AdminUsers.php'>Admin Users</a></li>
      <li><a>Usuario - <?php echo $username?></a></li>  
      <li><a>Rol Usuario - <?php echo $rol?></a></li>  
      <li><a href='logout.php'>Logout</a></li>
      </ul>
      </div>
      </nav>
   </body>
</html>