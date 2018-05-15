<?php session_start();

if(!isset($_COOKIE['sejour_france']))
{
    $first_visit=true;
    setcookie('sejour_france', 'bienvenue', time() + 60*60*24*365);
}

?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Destinations France</title>
        <meta name="description" content=" Decouvrez la France sous un nouvel angle, son patrimoine, sa culture, son histoire vous laissera sans voix." />
    </head>
    <body>

    <!--MENU DE NAV-->
    <?php include ('menu.php'); 
        
        require ('database.php');
        $db = Database::connect();
        $data = $db->query("
        SELECT article.*, category.* FROM article, category WHERE article.category = category.id AND article.title='Destinations France'
        ");
        $element = $data->fetch();
        $db = Database::disconnect();
        
        ?>
    
    <article class='articles'>
        
        <section>
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