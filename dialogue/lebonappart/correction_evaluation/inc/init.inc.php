<?php 


//connexion a LA BDD

$pdoAppart = new PDO(
    'mysql:host=localhost;dbname=evaluation_correction',
    'root',//nom utilisateur
    '',// vide sur PC  et sur Mac 'root'
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,//afficher erreur navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);



?>