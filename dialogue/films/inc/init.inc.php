<?php 


//debug

function jevar_dump($mavariable) {
    echo "<pre class=\"alert alert-success\">var_dump : "; 
    var_dump($mavariable);
    echo "</pre>";

}

function jeprint_r($mavariable) {
    echo "<pre class=\"alert alert-success\">print_r : ";
    print_r($mavariable);
    echo "</pre>";
}

//connection a une base de données

$pdoDivertissements = $pdoDivertissements = new PDO(
    'mysql:host=localhost;dbname=divertissements',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,//afficher erreur navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

?>