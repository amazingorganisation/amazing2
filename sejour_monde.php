<?php session_start();

if(!isset($_COOKIE['sejour_monde']))
{
    $first_visit=true;
    setcookie('sejour_monde', 'bienvenue', time() + 60*60*24*365);
}

?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Destinations Internationales</title>
         <meta name="description" content="Visitez l'Europe,l'Afrique,l'Amérique, l'Asie, ou l'océanie,dépaysement garantie." />
    </head>
    <body>

    <!--MENU DE NAV-->
    <?php include ('menu.php'); 
        
        require ('database.php');
        $db = Database::connect();
        $data = $db->query("
        SELECT article.*, category.* FROM article, category WHERE article.category = category.id AND article.title='Destinations internationales'
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