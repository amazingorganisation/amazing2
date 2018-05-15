<?php 
session_start();
if(!isset($_COOKIE['connexion']))
{
    $first_visit=true;
    setcookie('connexion', 'bienvenue', time() + 60*60*24*365);
}

if ((!empty($_POST)))
    {
            $login = $_POST['login'];
            $password = $_POST['password'];
    
            require "database.php";
            $db = Database::connect();
    
            if(!empty($login) && !empty($password))
            {
                $query = $db->prepare("SELECT * FROM user WHERE login = :log ");
                $query->bindValue(':log',$login, PDO::PARAM_STR);
                $query->execute();
                $data = $query->fetch();
                $db = Database::disconnect();
                unset($db);
                //Acces OK:
                if (($data['password']==$password) && ($data['role']=='admin'))
                {
                    $_SESSION['login'] = $data['login'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['role'] = $data['role'];
                    header("Location: backoffice.php");
                }
                elseif($data['role']!='admin')
                    {
                        $message = '<p>Une erreur s\'est produite.<br/>Vous n\'êtes pas habilités à vous connecter.</p>';
                    }        
                elseif($data['password']!=$password || $data['login']!=$login)
                    {
                        $message = '<p>Une erreur s\'est produite.<br/>Le mot de passe ou le login n\'est pas correct.</p>';
                    }
            }
            else
            {
                $message= "<p>Merci de remplir les 2 champs !</p>";
            }
        }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body> 
    
    <?php include ('menu.php'); ?>
    
    <article class='wrapper'>
    <h3>Connexion au back-office</h3><br/>
        
    <?php
        if(empty($_POST))
            {
               echo "
                <form method='POST' action='connexion.php' id='cnx_form'>
                    <label for='login' id='login'>Login : </label>
                    <input type='text' name='login' id='login'>

                    <label for='password'>Password : </label>
                    <input type='password' name='password' id='password'>

                    <input type='submit'>
                </form>"; 
            }
        else
            {
            echo $message;
            echo 
            "<p><button><a href='./connexion.php'>RETOUR PAGE PRECEDENTE</a></button><br/><br/><button><a href='index.php'>RETOUR ACCEUIL</a></button>";
            }
    ?>
        
    </article>    
    </body>
</html>