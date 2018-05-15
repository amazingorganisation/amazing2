<?php session_start();
if(!isset($_COOKIE['sejour']))
{
    $first_visit=true;
    setcookie('sejour', 'bienvenue', time() + 60*60*24*365);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Séjours</title>
         <meta name="description" content=" Profitez de nos séjours d'exception, forêt exotiques, plage de sable blanc et bien  d'autres destinations à vous couper le soufle." />
    </head>
    
    <body>
    <!--MENU DE NAV-->
    <?php include ('menu.php'); ?>
    
    <article id="sejour">
        <section id='main_sejour'>
            <div class='wrapper'>
                <h3>Séjours</h3>
                <img src="sources_projet/main_sejour.jpg" >
                <p>Visitez l'une de nos destinations et profitez d'un séjour d'exception. Que vous rêviez de grands espaces, de forêts exotiques, de plages de sable blanc, de montagnes enneigées ou encore de déserts impénétrables, vous envies d'évasion seront exaucées. Nous proposons des destinations en France et à l'international, dans plus de 200 pays et territoires ! Vous trouverez forcément votre destination !
                </p>
            </div>
        </section>
        
        <section id='choix_sejour'>
            <div class="wrapper">
                <div class='destination'>
                        <h3><a href="sejour_france.php">Destinations France</a></h3>
                        <img src='sources_projet/puy-l-eveque3.jpg' id='img_puy' alt='Puy L Eveque'>
                        <p>Visitez la France et laissez vous surprendre par son terroir d'exception !</p> 
                </div>
                <div class='destination'>
                        <h3><a href="sejour_monde.php">Destinations Internationales</a></h3>
                        <img src='sources_projet/hutte.jpg' id='img_huttes' alt='Huttes'>
                        <p>Faites le tour du monde avec nos destinations réparties dans tous les continents!</p>
                </div>  
                <div class="clearing"></div>
            </div>           
        </section>
    </article>
        
    <?php include ('footer.php'); ?>
        
    </body>
</html>