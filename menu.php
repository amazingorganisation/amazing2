<?php

echo "
<header>
        <div>
            <div class='connexion'>";

                    // BOUTONS CONNEXION
                    if (isset($_SESSION['login']))
                    {
                        echo "<a href='disconnexion.php' class='button'>Déconnexion</a> <a href='backoffice.php'>".$_SESSION['login']."</a> ";
                    }
                    else
                    {
                        echo "<a href='connexion.php' class='button'>Connexion</a>"." ";
                    }
                    
                    // COOKIES BIENVENUE
                    if (isset($first_visit))
                    {
                        echo 'Bienvenue !'."</div>";
                    } 
                    else
                    {
                        echo "</div>";
                    }

            echo"
            <img src='sources_projet/logo_rz3.jpg' class='logo_image' alt='logo'>
            <h1>Amazing Travels</h1>    
            <nav>
                <ul>
                    <li><h4><a href='index.php'>Accueil</a></h4></li>
                    <li><h4><a href='sejour.php'>Séjours</a></h4></li>
                    <li><h4><a href='circuit.php'>Circuits</a></h4></li>
                    <li><h4><a href='contact.php'>Contact</a></h4></li>";

                    /*if (isset($_SESSION['login']))
                    {
                        echo "<li><button><a href='disconnexion.php'>Déconnexion</a></button></li><li>".$_SESSION['login']."</li>";
                    }
                    else
                    {
                        echo "<li><button><a href='connexion.php'>Connexion</a></button></li>";
                    }*/

            echo"</ul>
            </nav>
        </div>
</header>";
?>