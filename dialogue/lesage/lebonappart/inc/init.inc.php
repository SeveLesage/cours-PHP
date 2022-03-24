<?php 


//connection a LA base de données

$pdoWf3_php_intermediaire_severine = $pdoWf3_php_intermediaire_severine = new PDO(
    'mysql:host=localhost;dbname=wf3_php_intermediaire_severine',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,//afficher erreur navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);



?>