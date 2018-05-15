<?php 
session_start();
session_destroy();
unset($_SESSION['login']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Déconnexion</title>
    </head>
    
    <body>
    <!--MENU DE NAV-->
    <?php include ('menu.php'); ?>
    
        <article class='wrapper'>
    <h3>Déconnexion</h3><br><p>Vous avez été déconnecté</p>    
        </article>
        
    </body>
</html>