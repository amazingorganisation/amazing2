<?php
    session_start();
    require 'database.php';
    //require 'reception.php';
 
    if(!empty($_GET['id'])) 
    {
        $id = ($_GET['id']); //on récupère le id du GET transmis par lien 'supprimer'
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>BACK-OFFICE-DELETE</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/style.css" type='text/css'>
    </head>
    <body>
        
        <?php include('menu.php'); ?>
        
        <article class='wrapper'>
            <h3>Suppression Article</h3><br>
                <h4>Supprimer un item</h4><br>
                
        <?php 
            if(empty($_POST))
            {
                echo "<form action='article_delete.php' enctype='multipart/form-data' method='post'>
                <input type='hidden' name='id' value='". $id ."'>
                <p>Etes-vous sûr de vouloir supprimer ?</p>
                <br>
                <button type='submit'>Oui</button>
                <button><a href='backoffice.php'>Non</a></button>
                </form>";
            }
            else //Post n'est pas vide , donc on a validé le DELETE
            {
                $id = ($_POST['id']);
                $db = Database::connect();
                $statement = $db->prepare('DELETE FROM article WHERE id = ?');
                $statement->execute(array($id));
                Database::disconnect();
                echo "<p>L'élément a été supprimé !</p>";
                echo "
                <button><a href='backoffice.php'>RETOUR MENU ADMIN</a></button><br>
                <button><a href='index.php'>RETOUR ACCEUIL</a></button><br>";
            }
        ?> 
        </article>
        <?php include('footer.php'); ?>
        
    </body>
</html>