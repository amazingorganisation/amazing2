<?php 
session_start();

if(!isset($_COOKIE['circuit_theme']))
{
    $first_visit=true;
    setcookie('circuit_theme', 'bienvenue', time() + 60*60*24*365);
}
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Circuits thématiques</title>
        <meta name="description" content="Envie d'une croisière méditerranéenne, de voyage culturel ou de découverte gastronomique ? N'attendez plus : nous avons la formule qu'il vous faut !." />
    </head>
    <body>

    <!--MENU DE NAV-->
    <?php include ('menu.php'); 
        
        require ('database.php');
        $db = Database::connect();
        $data = $db->query("
        SELECT article.*, category.* FROM article, category WHERE article.category = category.id AND article.title='Circuit thematique'
        ");
        $element = $data->fetch();
        $db = Database::disconnect();
        
        
        ?>
    
    <article class='articles'>
        
        <section id=''>
            <div class='wrapper'>
               <h3><?php echo $element['title']; ?></h3> 
                <p>
                    <?php echo $element['content']; ?>
                </p>
            </div>
        </section>
    </article>
        
    <?php include ('footer.php'); ?>
        
    </body>
</html>