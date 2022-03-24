<?php 

//connection a une base de données

$pdoBlog = $pdoBlog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

?>