<?php 
session_start();

if(!isset($_COOKIE['circuit']))
{
    $first_visit=true;
    setcookie('circuit', 'bienvenue', time() + 60*60*24*365);
}

?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Circuits</title>
         <meta name="description" content="Créez votre circuit personnalisé ou choisissez l'une de nos formules thématiques." />
    </head>
    <body>

    <!--MENU DE NAV-->
    <?php include ('menu.php'); ?>
    
    <article id='circuit'>
        <section id='circuit_presentation'>
            <div class='wrapper'>
                <div id='mosaic'>
                    <h3>Circuits</h3>
                    <img src='sources_projet/circuit.jpg' id='mosaic_img' alt="mosaïque">
                    <p>Créez votre circuit personnalisé ou choisissez l'une de nos formules thématiques !</p>
                </div>
            </div>
        </section>
        
        <section id='circuit_1'>
            <div class='wrapper'>
                <h3><a href='circuit_perso.php'>Circuit sur mesure</a></h3>
                <img src='sources_projet/minicar.jpg' id='minicar' alt="minibus">
                <p>Faites nous part de votre projet, de vos envies et de vos exigences, et nous mettons en place les conditions de leur réalisation !</p>
            </div>
            <div class="clearing"></div>
        </section>
        
        <section id='circuit_2'>
            <div class='wrapper'>
                <h3><a href='circuit_theme.php'>Circuit thématique</a></h3>
                <img src='sources_projet/london1.jpg' id='london' alt="Big Ben">
                <p>Envie d'une croisière méditerranéenne, de voyage culturel ou de découverte gastronomique ? N'attendez plus : nous avons la formule qu'il vous faut !</p>
            </div>
        </section>
        <div class="clearing"></div>
    </article>
        
    <?php include ('footer.php'); ?>
        
    </body>
</html>