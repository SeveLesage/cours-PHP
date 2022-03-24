<?php 

/**Dans cette page, comme je n'ai que du PHP, je ne ferme pas la balise */

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