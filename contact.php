<?php 
session_start();
if(!isset($_COOKIE['contact']))
{
    $first_visit=true;
    setcookie('contact', 'bienvenue', time() + 60*60*24*365);
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Contact</title>
    <meta charset="utf-8">
    <link type="text/css" href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
    <!--MENU DE NAV-->
    <?php include ('menu.php'); ?>
    
    
    <section id='contact'>
        <h3>Contactez-nous</h3>
        <div class='wrapper'>
            <p>Nous prenons en compte chacune de vos attentes pour vous assister dans la préparation de votre séjour sur mesure.</p>
            <form action='message.php' method='GET' name='formulaire'>
                <label for='name'>Nom :</label>
                <input type='text' name='name' id='name' placeholder='Votre nom & prénom' required>
                <label for='tel'>Téléphone :</label>
                <input type='text' name='tel' id='tel' placeholder='Votre téléphone'>
                <br>
                <label for='subject' name='subject'>Sujet du message :</label>
                <input type='radio' value='demande_contact' name='radio'> Demande de contact
                <input type='radio' value='demande_info' name='radio'> Demande d'information
                <input type='radio' value='suggestion' name='radio'> Suggestion d'amélioration
                <br/>
                <label for='message'>Message :</label>
                <br>
                <textarea name='message' id='message' placeholder='Votre message' cols='75' rows='5' required></textarea>
                <br>
                <label for='email'>Email :</label>
                <input type='text' name='email' id='email' placeholder='Votre email' required>
                <input type='submit' value='OK' class='button-3'>
            </form>
        </div>
    </section>
     
    <?php include ('footer.php'); ?>
    
    </body>
</html>
