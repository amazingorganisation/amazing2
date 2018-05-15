<?php
    session_start();
    require 'database.php';
    require 'reception.php';

    $isSuccess = $isUpdate = $titleError = $descriptionError = $categoryError = $contentError = $title = $description = $content = $category = $author = "";

    // UPDATE OU INSERT-> RECUPERER $author

    $db = Database::connect();
        $statement = $db->prepare("SELECT id FROM user WHERE login = ?");
        $login = $_SESSION['login'];
        $statement->execute(array($login));
        $item = $statement->fetch();
        $author = $item['id'];
    Database::disconnect();
    unset($db);

    // FORMULAIRE UPDATE : méthode GET pour récupérer l'id envoyé
    if(!empty($_GET['id']))
    {
        $isUpdate = true;
        $id = check($_GET['id']);
    }
    
    //si déjà cliqué sur MODIFIER ou AJOUTER
    if(!empty($_POST))
    {
        $title              = check($_POST['title']);
        $description        = check($_POST['description']);
        $category           = check($_POST['category']); 
        $content            = check($_POST['content']);
        $lastupdate         = check($_POST['update']); 
        $isSuccess          = true;
       
        /*if(empty($title)) 
        {
            $titleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;//Obligation de modifier tous les champs en cas de update
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false; 
        } 
         
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if(empty($content))
        {
            $contentError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }*/
        
        if(($isSuccess)&&($isUpdate)) // UPDATE
        { 
            $db = Database::connect();
            $statement = $db->prepare("UPDATE article SET title = ?, description = ?, category = ?, content = ?, last_author = ?, last_date = ? WHERE id = ?");        
            $statement->execute(array($title,$description,$category,$content,$author,$lastupdate,$id));
            Database::disconnect();
            header("Location: backoffice.php");
        }
        
        elseif(($isSuccess)&&($isUpdate == false)) // AJOUT
        {
            $db = Database::connect();
            try
            {
                $statement = $db->prepare("INSERT INTO article (category,content,title,description,last_author) values(?, ?, ?, ?, ?)");
                $statement->execute(array($category,$content,$title,$description,$author));
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
            Database::disconnect();
            header("Location: backoffice.php");
        }
    }

    // SUR LE FORMULAIRE UPDATE, SI LA VAR $_POST EST VIDE, PREMIER PASSAGE SUR LA PAGE, REMPLISSAGE DES CHAMPS  :
    elseif((empty($_POST))&&($isUpdate))
    {
        $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM article where id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $title          = $item['title'];
            $description    = $item['description'];
            $content        = $item['content'];
            $category       = $item['category'];
            $lastupdate     = $item['last_date'];
        Database::disconnect();
        unset($db);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>BACK-OFFICE-UPDATE</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type='text/css'>
    </head>
    <body>
        <?php include ('menu.php'); ?>
         <article id='article_update'>
            <div class='wrapper'>
                <?php 
                    if($isUpdate)
                    {
                        echo "<h3>MODIFICATION ARTICLE</h3>";
                        echo "<h4>Modifier un item</h4>";
                    }
                    else
                    {
                        echo "<h3>INSERTION ARTICLE</h3>";
                        echo "<h4>Ajouter un item</h4>";
                    }
                ?>
                    <br>
                    <div>
                    <form action="<?php 
                                  if(isset($id))
                                      echo 'article_modif.php?id='.$id;
                                  else 
                                      echo 'article_modif.php';  
                                  ?>"
                          method="post" enctype="multipart/form-data"> <!--on utilise la méthode GET pour récupérer l'id -->
                        <label for="title">Titre:</label>
                        <input type="text" id="title" name="title" placeholder="titre" value="<?php echo $title;?>">
                        <br>    
                        <label for="description">Description:</label><br>
                        <textarea id="description" name="description" placeholder="Description" cols='100' rows='5' ><?php echo $description;?></textarea>
                        <br> 
                        <label for="content">Contenu: </label><br>
                        <textarea id="content" name="content" placeholder="Contenu" cols='100' rows='10' ><?php echo $content;?></textarea>
                        <br>
                        <label for="category">Catégorie:</label>
                        <select id="category" name="category">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM category') as $row) 
                           {
                                if($row['id'] == $category)
                                    echo '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] . '</option>';//option par défaut si l'id est linké à l'id catégorie
                                else
                                    echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <input type='hidden' id='update' name='update' value='<?php $lastupdate = new DateTime(); echo $lastupdate->format('Y-m-d H:i:s');?>'>
                        <br>
                        <div>
                            <button type="submit">
                            <?php 
                                if($isUpdate) echo "Modifier";
                                else echo "Ajouter";
                            ?>
                            </button>
                            <button><a href="backoffice.php">Retour</a></button>
                       </div>
                    </form>
                </div>
            </div>
             
        </article>   
        
        <?php include ('footer.php'); ?>
        
    </body>
</html>