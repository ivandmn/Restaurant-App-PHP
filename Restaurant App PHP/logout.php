<?php
//PHP for logout
session_start();
//Destroy session
session_destroy();
//Redirect to index.php
header("Location:index.php");
?>