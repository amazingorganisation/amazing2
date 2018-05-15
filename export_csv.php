<?php

// Variables de connexion à la base des données 

require ('database.php');

// Connexion à la bdd

$db = Database::connect();

// Nom de la table à exporter 

$db_record='message';  
  
// Nom du fichier CSV à exporter 

$csv_filename = $db_record.'_'.date('Y-m-d').'.csv';

// Création d'un fichier CSV vide 

$csv_export = '';  

// Sélection ligne des titres

$query2 = $db->prepare("SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'message' ");
$query2->execute();

// Sélection des données de la table 

$query = $db->prepare("SELECT * FROM message "); 
$query->execute();

// Boucle pour remplir les en-têtes 

while($header = $query2->fetch())
    {
        $csv_export.= '"'.$header['COLUMN_NAME'].'";';
    }
$csv_export.="\n";

// Boucle pour remplir les données

$colCount = $query->columnCount();

while($row = $query->fetch())
{
    for($i=0; $i<$colCount; $i++)
    {
        $csv_export.= '"'.$row[$i].'";';
    }
    $csv_export.="\n";
    
}

// Export des données au format CSV et appel du fichier créé pour téléchargement 

header("Content-type: text/x-csv"); 
header("Content-Disposition: attachment; filename=".$csv_filename.""); 
echo($csv_export); 

?>