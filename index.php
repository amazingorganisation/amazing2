<?php 
session_start();
if(!isset($_COOKIE['index']))
{
    $first_visit=true;
    setcookie('index', 'bienvenue', time() + 60*60*24*30); //le cookie est fixé à un mois
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="google-site-verification" content="0-SoA84HGBQrUwSg7A-I4dsr_5JK2JM0znEn9M4mLfY" />
        <link rel="stylesheet" href="./css/style.css" type="text/css">
        <title>Amazing Travels</title>
        <meta name="description" content=" Découvrez nos voyages époustouflants à des prix défiant toute concurrence." />
    </head>
    <body>

    <!--MENU DE NAV-->
    <?php include ('menu.php'); ?>
    
        
    <!--PARTIE 1 Image principale-->
    <section id="main"> 
        <div class="wrapper">
            <h2>Créez votre<br><b>propre voyage</b></h2>
            <a href="circuit_perso.php" class="button-1">En savoir plus</a>
        </div>
    </section>
        
        
    <!--PARTIE 2 Description des étapes-->
    <section id="section_2">
        <div class="wrapper">
            <ul>
                <li id="step1">
                    <h3>Echanger</h3>
                    <p>Confiez-nous vos rêves d'évasion : nous trouverons la formule qui comblera vos attentes.</p>
                </li>
                <li id="step2">
                    <h3>Préparer</h3>
                    <p>Bénéficiez de l'expertise de nos spécialistes, ils vous accompagnent dans la réalisation de votre projet.</p>
                </li>
                <li id="step3">
                    <h3>Profiter</h3>
                    <p>Nous assurons votre sécurité et veillons à votre pleine sérénité tout au long de votre voyage.</p>
                </li>
            </ul>
            <div class="clearing"></div>
        </div>
    </section>
    
        
    <!--PARTIE 3 Description des possibiltés-->
    <section id="section_3">
        <div class="wrapper">
            <div class="possibility"  style="background-image: url('sources_projet/image_small_1.jpg')">
                <div class="overlay">
                    <h3>Tourisme culturel</h3>
                    <p>Découvrez des sites d'exception, ouvrez votre esprit et partagez des moments fabuleux !</p>
                    <a href="circuit_theme.php" class="button-2">Plus d'infos</a>
                </div>
            </div>
            
            <div class="possibility" style="background-image: url('sources_projet/Image_small_2.jpg')">
                <div class="overlay">
                    <h3>Séjours exotiques</h3>
                    <p>Laissez vous surprendre par nos destinations les plus originales ! Plus de 200 pays à la carte !</p>
                    <a href="sejour_monde.php" class="button-2">Plus d'infos</a>
                </div>
            </div>
            <div class="clearing"></div>
        </div>
    </section>

        
    <!--PIED DE PAGE-->
    <?php include ('footer.php'); ?>
        
    </body>

</html>