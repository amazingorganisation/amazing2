<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type ="text/css" href="css/style.css">
        <title>Amazing Travels</title>
    </head>
    <body>

    <?php include ('menu.php'); ?>
        
    <article id='message'>
        <section class='wrapper'>
        <h3>Messages</h3><br>
            
        <?php
            require 'reception.php'; //fonction de contrôle avant envoi en BD
            require 'database.php';
            
            if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['message']) )
            {
                $name=$_GET['name'];
                $phone=$_GET['tel'];
                $email=$_GET['email'];
                $subject=$_GET['radio'];
                $message=$_GET['message'];
                $clean_message=check($message);
                if($message != $clean_message)
                {
                    echo "Les caractères non souhaités { , } , % ont été supprimés de votre message.<br/>";
                    echo "Le message ".$message." a été remplacé par ".$clean_message."<br/>";
                }
                // envoi vers BD
                $db = Database::connect();
                $query = $db->prepare('INSERT INTO message (creator,phone,mail,subject,content) VALUES (?, ?, ?, ?, ?)');
                $query->execute(array($name,$phone,$email,$subject,$clean_message));
                unset($_GET,$name,$phone,$email,$subject,$message);
                Database::disconnect();

                // affichage message
                $date = date("d-m-Y");
                $heure = date("H:i");
                echo "Message envoyé le $date à $heure . Merci de l'attention portée à notre site.<br/><br/>";
            }
            
            //Affichage des messages pour l'admin
            
            if ((isset($_SESSION['role']))&&($_SESSION['role']=='admin'))
            {
                $db = Database::connect();
                try
                {
                    $query = $db->query('SELECT * FROM message;');
                }
                catch(PDOException $e)
                {
                    die($e->getMessage());
                }
                
                echo '<u>Administrateur, voici la liste de tous les messages </u>:'.'<br>';
                                
               /* while($row = $query->fetch())
                {
                    echo $row['id']." ".$row['creator'].$row['phone']." ".$row['mail']." ".$row['subject']." ".$row['content'].'<br>';
                };
                Database::disconnect();*/
    
                echo "<table>
                  <thead>
                    <tr>
                      <th>ID</th><th>Créateur</th><th>Téléphone</th><th>Mail</th><th>Sujet</th><th>Contenu</th>
                    </tr>
                  </thead>
                  <tbody>";
                
                        while($item = $query->fetch())
                        {
                            echo '<tr>';
                            echo '<td>'. $item['id'] . '</td>';
                            echo '<td>'. $item['creator'] . '</td>';
                            echo '<td>'. $item['phone'] . '</td>';
                            echo '<td>'. $item['mail'] . '</td>';
                            echo '<td>'. $item['subject'] . '</td>';
                            echo '<td>'. $item['content'] . '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                  
                echo "    
                  </tbody>
                </table>";
            
            echo '<br>'."<button><a href='export_csv.php'>Télécharger fichier CSV</a></button>".'<br><br>'."<button><a href='index.php'>RETOUR ACCEUIL</a></button>".'<br>';
            }
        ?>
                      
        </section>
    </article>
        
    <?php include ('footer.php'); ?>
        
    </body>
</html>