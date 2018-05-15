<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>BACK OFFICE</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/style.css" type='text/css'>
    </head>
    
    <?php include ('menu.php'); ?>
    
    <body>
        <article id='bo_article'>
            <div class='wrapper'>
                <h3>Back Office</h3>
                <p>Bienvenue <span style=color:red> <?php echo $_SESSION['login']; ?> </span>,vous êtes connecté sur le Back Office!</p>
                
                <h4>> Liste des articles</h4>
                <section>
                        <table>
                          <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Date</th>
                                <th>Auteur</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>         
                              <?php
                                require 'database.php';
                                $db = Database::connect();
                                $statement = $db->query('
                                SELECT article.id AS articleId, article.title, article.last_date, user.login, category.name AS categoryName 
                                FROM article, user, category 
                                WHERE article.category = category.id AND article.last_author = user.id
                                ORDER BY article.last_date DESC
                                ');

                                while($item = $statement->fetch())
                                {
                                    echo '<tr>';
                                        echo '<td>'.'<a href="article_modif.php?id='.$item['articleId'].'">'. $item['title'] .'</a>'.'</td>';
                                        echo '<td>'. $item['categoryName'] . '</td>';
                                        echo '<td>'. $item['last_date'] . '</td>';
                                        echo '<td>'. $item['login'] . '</td>';
                                        echo '<td>';
                                        echo '<button><a href="article_modif.php?id='. $item['articleId']. '">Modifier</a></button>';
                                        echo ' ';
                                        echo '<button><a href="article_delete.php?id='. $item['articleId']. '">Supprimer</a></button>';
                                        echo '</td>';                                    
                                    echo '</tr>';
                                }
                                Database::disconnect();
                              ?>
                          </tbody>
                        </table>
                </section>
                <h4><a href="article_modif.php">> Ajouter un article</a></h4>
                <h4><a href="message.php">> Voir les messages</a></h4>
              
                <button><a href='index.php'>RETOUR ACCEUIL</a></button>
                
                </div>
        </article>
        
        <?php include ('footer.php'); ?>
        
    </body>
</html>