<?php 
session_start();
if(!isset($_COOKIE['circuit_perso']))
{
    $first_visit=true;
    setcookie('circuit_perso', 'bienvenue', time() + 60*60*24*365);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Circuits personnalisés</title>
         <meta name="description" content=".Faites nous part de votre projet, de vos envies et de vos exigences, et nous mettons en place le circuit de vos rêves" />
        
    </head>
    <body>

    <!--MENU DE NAV-->
    <?php include ('menu.php'); 
        
        require ('database.php');
        $db = Database::connect();
        $data = $db->query("
        SELECT article.*, category.* FROM article, category WHERE article.category = category.id AND article.title='Circuits sur mesure'
        ");
        $element = $data->fetch();
        $db = Database::disconnect();
    ?>
        
    <article class='articles'>
    
        <section>
            <div class='wrapper'>
                <h3><?php echo $element['title']; ?></h3>
               
               <?php echo $element['content']; ?>
            </div>
        </section>
    </article>
        
    <?php include ('footer.php'); ?>
        
    </body>
</html>